<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Http\Resources\TimeEntryResource;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TimeEntryController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $entries = $request->user()
            ->timeEntries()
            ->latest('started_at')
            ->paginate(15);

        return TimeEntryResource::collection($entries);
    }

    public function store(StoreTimeEntryRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Verify user is member of the project's organization
        $this->authorizeProject($request, $data['project_id']);

        // If task_id is provided, verify it belongs to the project
        if (! empty($data['task_id'])) {
            $this->authorizeTask($data['task_id'], $data['project_id']);
        }

        // Default started_at to now (start a timer)
        if (empty($data['started_at'])) {
            $data['started_at'] = now();
        }

        // Check for overlapping running entries
        $this->preventOverlap($request, $data);

        // Calculate duration if both start and end are provided
        if (! empty($data['ended_at'])) {
            $data['duration'] = now()->parse($data['ended_at'])->diffInSeconds(now()->parse($data['started_at']));
        }

        $entry = $request->user()->timeEntries()->create($data);

        return (new TimeEntryResource($entry))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, TimeEntry $timeEntry): TimeEntryResource
    {
        abort_unless($timeEntry->user_id === $request->user()->id, 403);

        return new TimeEntryResource($timeEntry);
    }

    public function update(UpdateTimeEntryRequest $request, TimeEntry $timeEntry): TimeEntryResource
    {
        abort_unless($timeEntry->user_id === $request->user()->id, 403);

        $data = $request->validated();

        if (! empty($data['project_id'])) {
            $this->authorizeProject($request, $data['project_id']);
        }

        if (! empty($data['task_id'])) {
            $projectId = $data['project_id'] ?? $timeEntry->project_id;
            $this->authorizeTask($data['task_id'], $projectId);
        }

        // Recalculate duration if times changed
        $startedAt = $data['started_at'] ?? $timeEntry->started_at;
        $endedAt = array_key_exists('ended_at', $data) ? $data['ended_at'] : $timeEntry->ended_at;

        if ($endedAt) {
            $data['duration'] = now()->parse($endedAt)->diffInSeconds(now()->parse($startedAt));
        }

        $timeEntry->update($data);

        return new TimeEntryResource($timeEntry);
    }

    public function destroy(Request $request, TimeEntry $timeEntry): JsonResponse
    {
        abort_unless($timeEntry->user_id === $request->user()->id, 403);

        $timeEntry->delete();

        return response()->json(null, 204);
    }

    public function stop(Request $request, TimeEntry $timeEntry): TimeEntryResource
    {
        abort_unless($timeEntry->user_id === $request->user()->id, 403);

        if ($timeEntry->ended_at !== null) {
            abort(422, 'This time entry is already stopped.');
        }

        $now = now();
        $timeEntry->update([
            'ended_at' => $now,
            'duration' => $now->diffInSeconds($timeEntry->started_at),
        ]);

        return new TimeEntryResource($timeEntry);
    }

    private function authorizeProject(Request $request, int $projectId): void
    {
        $project = Project::findOrFail($projectId);

        abort_unless(
            $project->organization->users()->where('user_id', $request->user()->id)->exists(),
            403,
            'You are not a member of this project\'s organization.'
        );
    }

    private function authorizeTask(int $taskId, int $projectId): void
    {
        $task = Task::findOrFail($taskId);

        abort_unless(
            $task->project_id === $projectId,
            422,
            'Task does not belong to the specified project.'
        );
    }

    private function preventOverlap(Request $request, array $data): void
    {
        $runningEntry = $request->user()
            ->timeEntries()
            ->whereNull('ended_at')
            ->exists();

        if ($runningEntry && empty($data['ended_at'])) {
            abort(422, 'You already have a running time entry. Stop it before starting a new one.');
        }
    }
}
