<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimeEntryTest extends TestCase
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

    public function test_user_can_list_time_entries(): void
    {
        [$user, $org, $project] = $this->createContext();
        TimeEntry::factory()->count(3)->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);
        // Another user's entry — should not show
        TimeEntry::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->getJson('/api/time-entries');

        $response->assertOk()
            ->assertJsonCount(3, 'data');
    }

    public function test_user_can_start_timer(): void
    {
        [$user, $org, $project] = $this->createContext();

        $response = $this->actingAs($user)->postJson('/api/time-entries', [
            'project_id' => $project->id,
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.project_id', $project->id)
            ->assertJsonPath('data.ended_at', null);
    }

    public function test_user_can_create_completed_time_entry(): void
    {
        [$user, $org, $project] = $this->createContext();

        $response = $this->actingAs($user)->postJson('/api/time-entries', [
            'project_id' => $project->id,
            'started_at' => '2026-03-25 09:00:00',
            'ended_at' => '2026-03-25 10:30:00',
            'notes' => 'Worked on feature X',
        ]);

        $response->assertStatus(201);
        $this->assertNotNull($response->json('data.duration'));
    }

    public function test_user_cannot_start_overlapping_timer(): void
    {
        [$user, $org, $project] = $this->createContext();

        // Start a running timer
        TimeEntry::factory()->running()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->postJson('/api/time-entries', [
            'project_id' => $project->id,
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_stop_timer(): void
    {
        [$user, $org, $project] = $this->createContext();

        $entry = TimeEntry::factory()->running()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'started_at' => now()->subHour(),
        ]);

        $response = $this->actingAs($user)->postJson("/api/time-entries/{$entry->id}/stop");

        $response->assertOk();
        $this->assertNotNull($response->json('data.ended_at'));
        $this->assertNotNull($response->json('data.duration'));
    }

    public function test_cannot_stop_already_stopped_timer(): void
    {
        [$user, $org, $project] = $this->createContext();

        $entry = TimeEntry::factory()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->postJson("/api/time-entries/{$entry->id}/stop");

        $response->assertStatus(422);
    }

    public function test_user_can_view_time_entry(): void
    {
        [$user, $org, $project] = $this->createContext();
        $entry = TimeEntry::factory()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->getJson("/api/time-entries/{$entry->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $entry->id);
    }

    public function test_user_cannot_view_others_time_entry(): void
    {
        [$user, $org, $project] = $this->createContext();
        $other = User::factory()->create();
        $entry = TimeEntry::factory()->create([
            'user_id' => $other->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->getJson("/api/time-entries/{$entry->id}");

        $response->assertStatus(403);
    }

    public function test_user_can_update_time_entry(): void
    {
        [$user, $org, $project] = $this->createContext();
        $entry = TimeEntry::factory()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->putJson("/api/time-entries/{$entry->id}", [
            'notes' => 'Updated notes',
        ]);

        $response->assertOk()
            ->assertJsonPath('data.notes', 'Updated notes');
    }

    public function test_user_can_delete_time_entry(): void
    {
        [$user, $org, $project] = $this->createContext();
        $entry = TimeEntry::factory()->create([
            'user_id' => $user->id,
            'project_id' => $project->id,
        ]);

        $response = $this->actingAs($user)->deleteJson("/api/time-entries/{$entry->id}");

        $response->assertStatus(204);
        $this->assertSoftDeleted('time_entries', ['id' => $entry->id]);
    }

    public function test_task_must_belong_to_project(): void
    {
        [$user, $org, $project] = $this->createContext();
        $otherProject = Project::factory()->create(['organization_id' => $org->id]);
        $task = Task::factory()->create(['project_id' => $otherProject->id]);

        $response = $this->actingAs($user)->postJson('/api/time-entries', [
            'project_id' => $project->id,
            'task_id' => $task->id,
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_create_entry_with_task(): void
    {
        [$user, $org, $project] = $this->createContext();
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->postJson('/api/time-entries', [
            'project_id' => $project->id,
            'task_id' => $task->id,
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.task_id', $task->id);
    }

    public function test_non_org_member_cannot_create_entry(): void
    {
        $project = Project::factory()->create();
        $outsider = User::factory()->create();

        $response = $this->actingAs($outsider)->postJson('/api/time-entries', [
            'project_id' => $project->id,
        ]);

        $response->assertStatus(403);
    }
}
