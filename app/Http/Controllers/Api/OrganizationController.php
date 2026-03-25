<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $organizations = $request->user()->organizations()->latest()->paginate(15);

        return OrganizationResource::collection($organizations);
    }

    public function store(StoreOrganizationRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
            $base = $data['slug'];
            $counter = 1;
            while (Organization::where('slug', $data['slug'])->exists()) {
                $data['slug'] = $base . '-' . $counter++;
            }
        }

        $organization = Organization::create($data);
        $organization->users()->attach($request->user()->id, ['role' => 'owner']);

        return (new OrganizationResource($organization))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Organization $organization): OrganizationResource
    {
        $this->authorizeMember($request, $organization);

        return new OrganizationResource($organization);
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization): OrganizationResource
    {
        $this->authorizeRole($request, $organization, ['owner', 'admin']);

        $organization->update($request->validated());

        return new OrganizationResource($organization);
    }

    public function destroy(Request $request, Organization $organization): JsonResponse
    {
        $this->authorizeRole($request, $organization, ['owner']);

        $organization->delete();

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
