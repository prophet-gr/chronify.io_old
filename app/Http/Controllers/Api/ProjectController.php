<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Organization;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function index(Request $request, Organization $organization): AnonymousResourceCollection
    {
        $this->authorizeMember($request, $organization);

        return ProjectResource::collection(
            $organization->projects()->latest()->paginate(15)
        );
    }

    public function store(StoreProjectRequest $request, Organization $organization): JsonResponse
    {
        $this->authorizeRole($request, $organization, ['owner', 'admin']);

        $project = $organization->projects()->create($request->validated());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Project $project): ProjectResource
    {
        $this->authorizeMember($request, $project->organization);

        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project): ProjectResource
    {
        $this->authorizeRole($request, $project->organization, ['owner', 'admin']);

        $project->update($request->validated());

        return new ProjectResource($project);
    }

    public function destroy(Request $request, Project $project): JsonResponse
    {
        $this->authorizeRole($request, $project->organization, ['owner', 'admin']);

        $project->delete();

        return response()->json(null, 204);
    }

    private function authorizeMember(Request $request, Organization $organization): void
    {
        abort_unless(
            $organization->users()->where('user_id', $request->user()->id)->exists(),
            403,
            'You are not a member of this organization.'
        );
    }

    private function authorizeRole(Request $request, Organization $organization, array $roles): void
    {
        $pivot = $organization->users()->where('user_id', $request->user()->id)->first()?->pivot;

        abort_unless($pivot && in_array($pivot->role, $roles), 403, 'Insufficient permissions.');
    }
}
