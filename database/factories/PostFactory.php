<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        Post::truncate();
        $title = $this->faker->sentence;

        return [ 
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(250), 
            'image' => $this->faker->imageUrl(), 
            'posted' => $this->faker->randomElement(['yes', 'no']),
            'category_id' => $this->faker->randomElement([1, 2]),
            'user_id' => $this->faker->randomElement([1, 2]), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
