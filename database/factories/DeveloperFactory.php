<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developer>
 */
class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $skills = [
            'PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React', 'Node.js', 
            'MySQL', 'PostgreSQL', 'Docker', 'Git', 'AWS', 'HTML', 
            'CSS', 'TypeScript', 'Python', 'Java', 'Angular', 'Bootstrap'
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'seniority' => fake()->randomElement(['Jr', 'Pl', 'Sr']),
            'skills' => fake()->randomElements($skills, fake()->numberBetween(2, 6)),
            'user_id' => 1, // Será sobrescrito no seeder
        ];
    }
}
