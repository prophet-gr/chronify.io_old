<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Project> */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->catchPhrase(),
            'description' => fake()->optional()->paragraph(),
            'color' => fake()->hexColor(),
            'is_billable' => fake()->boolean(60),
            'hourly_rate' => fn (array $attrs) => $attrs['is_billable'] ? fake()->randomFloat(2, 50, 250) : null,
            'status' => 'active',
        ];
    }

    public function archived(): static
    {
        return $this->state(['status' => 'archived']);
    }

    public function billable(float $rate = 100.00): static
    {
        return $this->state(['is_billable' => true, 'hourly_rate' => $rate]);
    }
}
