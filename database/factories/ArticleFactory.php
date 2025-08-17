<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(fake()->numberBetween(3, 8));
        
        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'content' => '<p>' . fake()->paragraphs(fake()->numberBetween(3, 8), true) . '</p>',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'user_id' => 1, // Será sobrescrito no seeder
        ];
    }
}
