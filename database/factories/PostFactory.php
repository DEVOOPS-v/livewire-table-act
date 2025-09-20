<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),              // random title
            'content' => $this->faker->paragraph(5),          // random content
            'is_archived' => $this->faker->boolean(20),       // 20% chance archived
            // 'user_id' => User::factory(),                     // assign to a user
        ];
    }
}
