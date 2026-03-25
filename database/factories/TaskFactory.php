<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Task> */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'name' => fake()->sentence(3),
            'description' => fake()->optional()->sentence(),
            'is_billable' => null,
            'status' => 'active',
        ];
    }

    public function completed(): static
    {
        return $this->state(['status' => 'completed']);
    }
}
