<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React'];

        return [
            'title' => fake()->title(),
            'content' => fake()->text(),
            'tags' => fake()->randomElements(
                $tags,
                fake()->numberBetween(0, count($tags))
            ),
            'metadata' => null,
            'status' => fake()->randomElement(PostStatus::cases()),
            'user_id' => User::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year'),
            'updated_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
