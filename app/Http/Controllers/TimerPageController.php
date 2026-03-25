<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class TimerPageController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $organizations = $user->organizations()->pluck('organizations.id');

        $activeEntry = $user->timeEntries()
            ->whereNull('ended_at')
            ->with(['project:id,name,color', 'task:id,name,project_id'])
            ->first();

        $projects = Project::whereIn('organization_id', $organizations)
            ->select('id', 'name', 'color')
            ->get();

        $tasks = Task::whereIn('project_id', $projects->pluck('id'))
            ->select('id', 'name', 'project_id')
            ->where('status', '!=', 'completed')
            ->get();

        $todayEntries = $user->timeEntries()
            ->where('started_at', '>=', Carbon::today())
            ->with(['project:id,name,color'])
            ->latest('started_at')
            ->get();

        return Inertia::render('Timer', [
            'activeEntry' => $activeEntry,
            'projects' => $projects,
            'tasks' => $tasks,
            'todayEntries' => $todayEntries,
        ]);
    }

    public function start(Request $request)
    {
        $user = $request->user();

        $running = $user->timeEntries()->whereNull('ended_at')->exists();
        if ($running) {
            return back()->withErrors(['timer' => 'You already have a running timer. Stop it first.']);
        }

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'task_id' => 'nullable|exists:tasks,id',
            'notes' => 'nullable|string|max:500',
        ]);

        $user->timeEntries()->create([
            'project_id' => $validated['project_id'],
            'task_id' => $validated['task_id'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'started_at' => now(),
        ]);

        return redirect()->back();
    }

    public function stop(Request $request)
    {
        $user = $request->user();

        $entry = $user->timeEntries()->whereNull('ended_at')->first();

        if (! $entry) {
            return back()->withErrors(['timer' => 'No running timer found.']);
        }

        $now = now();
        $entry->update([
            'ended_at' => $now,
            'duration' => $now->diffInSeconds($entry->started_at),
        ]);

        return redirect()->back();
    }
}
