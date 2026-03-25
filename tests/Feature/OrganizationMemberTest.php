<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationMemberTest extends TestCase
{
    use RefreshDatabase;

    private function createOrgWithOwner(): array
    {
        $owner = User::factory()->create();
        $org = Organization::factory()->create();
        $org->users()->attach($owner->id, ['role' => 'owner']);

        return [$owner, $org];
    }

    public function test_owner_can_list_members(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();

        $response = $this->actingAs($owner)->getJson("/api/organizations/{$org->id}/members");

        $response->assertOk()
            ->assertJsonCount(1, 'data');
    }

    public function test_owner_can_add_member(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();
        $newUser = User::factory()->create();

        $response = $this->actingAs($owner)->postJson("/api/organizations/{$org->id}/members", [
            'email' => $newUser->email,
            'role' => 'member',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('organization_user', [
            'organization_id' => $org->id,
            'user_id' => $newUser->id,
            'role' => 'member',
        ]);
    }

    public function test_cannot_add_duplicate_member(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();

        $response = $this->actingAs($owner)->postJson("/api/organizations/{$org->id}/members", [
            'email' => $owner->email,
        ]);

        $response->assertStatus(422);
    }

    public function test_owner_can_update_member_role(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();
        $member = User::factory()->create();
        $org->users()->attach($member->id, ['role' => 'member']);

        $response = $this->actingAs($owner)->putJson("/api/organizations/{$org->id}/members/{$member->id}", [
            'role' => 'admin',
        ]);

        $response->assertOk()
            ->assertJsonPath('data.role', 'admin');
    }

    public function test_owner_can_remove_member(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();
        $member = User::factory()->create();
        $org->users()->attach($member->id, ['role' => 'member']);

        $response = $this->actingAs($owner)->deleteJson("/api/organizations/{$org->id}/members/{$member->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('organization_user', [
            'organization_id' => $org->id,
            'user_id' => $member->id,
        ]);
    }

    public function test_owner_cannot_remove_self(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();

        $response = $this->actingAs($owner)->deleteJson("/api/organizations/{$org->id}/members/{$owner->id}");

        $response->assertStatus(422);
    }

    public function test_member_cannot_add_members(): void
    {
        [$owner, $org] = $this->createOrgWithOwner();
        $member = User::factory()->create();
        $org->users()->attach($member->id, ['role' => 'member']);
        $newUser = User::factory()->create();

        $response = $this->actingAs($member)->postJson("/api/organizations/{$org->id}/members", [
            'email' => $newUser->email,
        ]);

        $response->assertStatus(403);
    }
}
