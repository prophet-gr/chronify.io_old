<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<TimeEntry> */
class TimeEntryFactory extends Factory
{
    public function definition(): array
    {
        $startedAt = fake()->dateTimeBetween('-30 days', 'now');
        $duration = fake()->numberBetween(900, 28800); // 15 min to 8 hours
        $endedAt = (clone $startedAt)->modify("+{$duration} seconds");

        return [
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'task_id' => null,
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
            'duration' => $duration,
            'is_billable' => fake()->boolean(50),
            'notes' => fake()->optional(0.7)->sentence(),
        ];
    }

    public function running(): static
    {
        return $this->state([
            'ended_at' => null,
            'duration' => null,
        ]);
    }
}
