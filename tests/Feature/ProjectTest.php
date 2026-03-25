<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    private function createOrgWithUser(string $role = 'owner'): array
    {
        $user = User::factory()->create();
        $org = Organization::factory()->create();
        $org->users()->attach($user->id, ['role' => $role]);

        return [$user, $org];
    }

    public function test_member_can_list_projects(): void
    {
        [$user, $org] = $this->createOrgWithUser('member');
        Project::factory()->count(3)->create(['organization_id' => $org->id]);
        Project::factory()->create(); // other org's project

        $response = $this->actingAs($user)->getJson("/api/organizations/{$org->id}/projects");

        $response->assertOk()
            ->assertJsonCount(3, 'data');
    }

    public function test_owner_can_create_project(): void
    {
        [$user, $org] = $this->createOrgWithUser();

        $response = $this->actingAs($user)->postJson("/api/organizations/{$org->id}/projects", [
            'name' => 'My Project',
            'color' => '#ff5733',
            'is_billable' => true,
            'hourly_rate' => 150.00,
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'My Project')
            ->assertJsonPath('data.is_billable', true);
    }

    public function test_member_cannot_create_project(): void
    {
        [$user, $org] = $this->createOrgWithUser('member');

        $response = $this->actingAs($user)->postJson("/api/organizations/{$org->id}/projects", [
            'name' => 'My Project',
        ]);

        $response->assertStatus(403);
    }

    public function test_member_can_view_project(): void
    {
        [$user, $org] = $this->createOrgWithUser('member');
        $project = Project::factory()->create(['organization_id' => $org->id]);

        $response = $this->actingAs($user)->getJson("/api/projects/{$project->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $project->id);
    }

    public function test_non_member_cannot_view_project(): void
    {
        $project = Project::factory()->create();
        $outsider = User::factory()->create();

        $response = $this->actingAs($outsider)->getJson("/api/projects/{$project->id}");

        $response->assertStatus(403);
    }

    public function test_owner_can_update_project(): void
    {
        [$user, $org] = $this->createOrgWithUser();
        $project = Project::factory()->create(['organization_id' => $org->id]);

        $response = $this->actingAs($user)->putJson("/api/projects/{$project->id}", [
            'name' => 'Updated Project',
            'status' => 'archived',
        ]);

        $response->assertOk()
            ->assertJsonPath('data.name', 'Updated Project')
            ->assertJsonPath('data.status', 'archived');
    }

    public function test_owner_can_delete_project(): void
    {
        [$user, $org] = $this->createOrgWithUser();
        $project = Project::factory()->create(['organization_id' => $org->id]);

        $response = $this->actingAs($user)->deleteJson("/api/projects/{$project->id}");

        $response->assertStatus(204);
        $this->assertSoftDeleted('projects', ['id' => $project->id]);
    }

    public function test_validates_project_fields(): void
    {
        [$user, $org] = $this->createOrgWithUser();

        $response = $this->actingAs($user)->postJson("/api/organizations/{$org->id}/projects", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
