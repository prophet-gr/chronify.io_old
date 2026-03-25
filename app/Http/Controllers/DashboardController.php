<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();

        $activeEntry = $user->timeEntries()
            ->whereNull('ended_at')
            ->with(['project', 'task'])
            ->first();

        $todayStart = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();

        $todayEntries = $user->timeEntries()
            ->where('started_at', '>=', $todayStart)
            ->get();

        $todayHours = $todayEntries->sum(function ($entry) {
            if ($entry->duration) {
                return $entry->duration;
            }
            if ($entry->started_at && ! $entry->ended_at) {
                return now()->diffInSeconds($entry->started_at);
            }
            return 0;
        });

        $weekHours = $user->timeEntries()
            ->where('started_at', '>=', $weekStart)
            ->sum('duration');

        $organizations = $user->organizations()->pluck('organizations.id');
        $projects = \App\Models\Project::whereIn('organization_id', $organizations)
            ->select('id', 'name', 'color')
            ->get();

        $recentEntries = $user->timeEntries()
            ->with(['project:id,name,color', 'task:id,name'])
            ->latest('started_at')
            ->limit(10)
            ->get();

        return Inertia::render('Dashboard', [
            'activeEntry' => $activeEntry,
            'projects' => $projects,
            'todayHours' => (int) $todayHours,
            'weekHours' => (int) $weekHours,
            'todayEntries' => $todayEntries->count(),
            'recentEntries' => $recentEntries,
        ]);
    }
}
