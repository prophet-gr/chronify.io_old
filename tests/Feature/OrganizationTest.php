<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    private function createOwner(?Organization $org = null): array
    {
        $user = User::factory()->create();
        $org = $org ?? Organization::factory()->create();
        $org->users()->attach($user->id, ['role' => 'owner']);

        return [$user, $org];
    }

    public function test_user_can_list_their_organizations(): void
    {
        [$user, $org] = $this->createOwner();
        Organization::factory()->create(); // another org user is NOT a member of

        $response = $this->actingAs($user)->getJson('/api/organizations');

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $org->id);
    }

    public function test_user_can_create_organization(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/organizations', [
            'name' => 'Acme Corp',
            'description' => 'A test org',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Acme Corp');

        $this->assertDatabaseHas('organization_user', [
            'user_id' => $user->id,
            'role' => 'owner',
        ]);
    }

    public function test_auto_generates_unique_slug(): void
    {
        $user = User::factory()->create();
        Organization::factory()->create(['slug' => 'acme-corp']);

        $response = $this->actingAs($user)->postJson('/api/organizations', [
            'name' => 'Acme Corp',
        ]);

        $response->assertStatus(201);
        $this->assertNotEquals('acme-corp', $response->json('data.slug'));
    }

    public function test_owner_can_update_organization(): void
    {
        [$user, $org] = $this->createOwner();

        $response = $this->actingAs($user)->putJson("/api/organizations/{$org->id}", [
            'name' => 'Updated Name',
        ]);

        $response->assertOk()
            ->assertJsonPath('data.name', 'Updated Name');
    }

    public function test_member_cannot_update_organization(): void
    {
        $org = Organization::factory()->create();
        $member = User::factory()->create();
        $org->users()->attach($member->id, ['role' => 'member']);

        $response = $this->actingAs($member)->putJson("/api/organizations/{$org->id}", [
            'name' => 'Hacked',
        ]);

        $response->assertStatus(403);
    }

    public function test_owner_can_delete_organization(): void
    {
        [$user, $org] = $this->createOwner();

        $response = $this->actingAs($user)->deleteJson("/api/organizations/{$org->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('organizations', ['id' => $org->id]);
    }

    public function test_non_member_cannot_view_organization(): void
    {
        $org = Organization::factory()->create();
        $outsider = User::factory()->create();

        $response = $this->actingAs($outsider)->getJson("/api/organizations/{$org->id}");

        $response->assertStatus(403);
    }

    public function test_member_can_view_organization(): void
    {
        [$user, $org] = $this->createOwner();

        $response = $this->actingAs($user)->getJson("/api/organizations/{$org->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $org->id);
    }
}
