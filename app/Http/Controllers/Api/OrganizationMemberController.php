<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrganizationMemberController extends Controller
{
    public function index(Request $request, Organization $organization): AnonymousResourceCollection
    {
        $this->authorizeMember($request, $organization);

        return MemberResource::collection($organization->users()->paginate(15));
    }

    public function store(Request $request, Organization $organization): JsonResponse
    {
        $this->authorizeRole($request, $organization, ['owner', 'admin']);

        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'role' => ['sometimes', 'string', 'in:admin,member'],
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();

        if ($organization->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'User is already a member.'], 422);
        }

        $organization->users()->attach($user->id, ['role' => $data['role'] ?? 'member']);

        $member = $organization->users()->where('user_id', $user->id)->first();

        return (new MemberResource($member))
            ->response()
            ->setStatusCode(201);
    }

    public function update(Request $request, Organization $organization, User $user): MemberResource
    {
        $this->authorizeRole($request, $organization, ['owner', 'admin']);

        $data = $request->validate([
            'role' => ['required', 'string', 'in:owner,admin,member'],
        ]);

        abort_unless(
            $organization->users()->where('user_id', $user->id)->exists(),
            404,
            'User is not a member of this organization.'
        );

        $organization->users()->updateExistingPivot($user->id, ['role' => $data['role']]);

        return new MemberResource($organization->users()->where('user_id', $user->id)->first());
    }

    public function destroy(Request $request, Organization $organization, User $user): JsonResponse
    {
        $this->authorizeRole($request, $organization, ['owner', 'admin']);

        abort_if(
            $request->user()->id === $user->id,
            422,
            'You cannot remove yourself from the organization.'
        );

        $organization->users()->detach($user->id);

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
