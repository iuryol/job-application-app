<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recruiter_id' => 1, // Cria um usuário automaticamente
            'title' => fake()->jobTitle(),
            'company' => fake()->company(),
            'description' => fake()->paragraph(),
            'location' => fake()->city(),
            'type' => fake()->randomElement(['clt', 'pj', 'freelancer']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
