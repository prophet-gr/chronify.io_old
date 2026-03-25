<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    private function createContext(): array
    {
        $user = User::factory()->create();
        $org = Organization::factory()->create();
        $org->users()->attach($user->id, ['role' => 'owner']);
        $project = Project::factory()->create(['organization_id' => $org->id]);

        return [$user, $org, $project];
    }

    public function test_member_can_list_tasks(): void
    {
        [$user, $org, $project] = $this->createContext();
        Task::factory()->count(3)->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->getJson("/api/projects/{$project->id}/tasks");

        $response->assertOk()
            ->assertJsonCount(3, 'data');
    }

    public function test_member_can_create_task(): void
    {
        [$user, $org, $project] = $this->createContext();

        $response = $this->actingAs($user)->postJson("/api/projects/{$project->id}/tasks", [
            'name' => 'Design mockups',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Design mockups');
    }

    public function test_member_can_view_task(): void
    {
        [$user, $org, $project] = $this->createContext();
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->getJson("/api/tasks/{$task->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $task->id);
    }

    public function test_member_can_update_task(): void
    {
        [$user, $org, $project] = $this->createContext();
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->putJson("/api/tasks/{$task->id}", [
            'name' => 'Updated task',
            'status' => 'completed',
        ]);

        $response->assertOk()
            ->assertJsonPath('data.name', 'Updated task')
            ->assertJsonPath('data.status', 'completed');
    }

    public function test_member_can_delete_task(): void
    {
        [$user, $org, $project] = $this->createContext();
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);
        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }

    public function test_non_member_cannot_access_tasks(): void
    {
        $project = Project::factory()->create();
        $outsider = User::factory()->create();

        $response = $this->actingAs($outsider)->getJson("/api/projects/{$project->id}/tasks");

        $response->assertStatus(403);
    }

    public function test_validates_task_name_required(): void
    {
        [$user, $org, $project] = $this->createContext();

        $response = $this->actingAs($user)->postJson("/api/projects/{$project->id}/tasks", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
