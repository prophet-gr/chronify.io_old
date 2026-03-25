<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function index(Request $request, Project $project): AnonymousResourceCollection
    {
        $this->authorizeMember($request, $project);

        return TaskResource::collection(
            $project->tasks()->latest()->paginate(15)
        );
    }

    public function store(StoreTaskRequest $request, Project $project): JsonResponse
    {
        $this->authorizeMember($request, $project);

        $task = $project->tasks()->create($request->validated());

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Task $task): TaskResource
    {
        $this->authorizeMember($request, $task->project);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task): TaskResource
    {
        $this->authorizeMember($request, $task->project);

        $task->update($request->validated());

        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task): JsonResponse
    {
        $this->authorizeMember($request, $task->project);

        $task->delete();

        return response()->json(null, 204);
    }

    private function authorizeMember(Request $request, Project $project): void
    {
        abort_unless(
            $project->organization->users()->where('user_id', $request->user()->id)->exists(),
            403,
            'You are not a member of this organization.'
        );
    }
}
