<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Project::class;
    
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'start_date' => fake()->dateTimeBetween('now', '+3 week'),
            'end_date' => fake()->dateTimeBetween('+4 week', '+6 week'),
            'required_workers' => fake()->numberBetween(20, 40),
        ];
    }
}
