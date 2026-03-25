<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class ReportPageController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();
        $organizations = $user->organizations()->pluck('organizations.id');

        $from = $request->input('from')
            ? Carbon::parse($request->input('from'))->startOfDay()
            : Carbon::now()->startOfWeek();

        $to = $request->input('to')
            ? Carbon::parse($request->input('to'))->endOfDay()
            : Carbon::now()->endOfDay();

        $projectFilter = $request->input('project_id');

        $query = $user->timeEntries()
            ->whereNotNull('ended_at')
            ->where('started_at', '>=', $from)
            ->where('started_at', '<=', $to);

        if ($projectFilter) {
            $query->where('project_id', $projectFilter);
        }

        $entries = $query->with(['project:id,name,color', 'task:id,name'])
            ->latest('started_at')
            ->get();

        $totalDuration = $entries->sum('duration');
        $totalEntries = $entries->count();

        $byProject = $entries->groupBy('project_id')->map(function ($group) {
            $project = $group->first()->project;

            return [
                'project_id' => $project?->id,
                'project_name' => $project?->name ?? 'No project',
                'color' => $project?->color,
                'entries_count' => $group->count(),
                'total_duration' => $group->sum('duration'),
            ];
        })->values();

        $projects = Project::whereIn('organization_id', $organizations)
            ->select('id', 'name', 'color')
            ->get();

        return Inertia::render('Reports', [
            'entries' => $entries,
            'projects' => $projects,
            'filters' => [
                'from' => $from->format('Y-m-d'),
                'to' => $to->format('Y-m-d'),
                'project_id' => $projectFilter,
            ],
            'summary' => [
                'total_duration' => (int) $totalDuration,
                'total_entries' => $totalEntries,
                'projects_count' => $byProject->count(),
                'by_project' => $byProject,
            ],
        ]);
    }
}
