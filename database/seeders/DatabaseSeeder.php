<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $owner = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $members = User::factory(4)->create();

        $org = Organization::factory()->create([
            'name' => 'Acme Corp',
            'slug' => 'acme-corp',
        ]);

        $org->users()->attach($owner, ['role' => 'owner']);
        foreach ($members as $member) {
            $org->users()->attach($member, ['role' => 'member']);
        }

        $projects = Project::factory(3)->create(['organization_id' => $org->id]);

        foreach ($projects as $project) {
            $tasks = Task::factory(rand(3, 6))->create(['project_id' => $project->id]);

            foreach ($tasks as $task) {
                $entryUser = $members->random();
                TimeEntry::factory(rand(2, 5))->create([
                    'user_id' => $entryUser->id,
                    'project_id' => $project->id,
                    'task_id' => $task->id,
                    'is_billable' => $project->is_billable,
                ]);
            }
        }

        // A couple entries for the owner too
        TimeEntry::factory(5)->create([
            'user_id' => $owner->id,
            'project_id' => $projects->first()->id,
            'task_id' => $projects->first()->tasks->first()->id,
        ]);
    }
}
