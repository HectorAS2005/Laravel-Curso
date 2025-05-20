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
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(250), 
            'image' => $this->faker->imageUrl(640, 480, 'posts', true), // genera URL de imagen falsa
            'posted' => $this->faker->randomElement(['yes', 'no']),
            'category_id' => 1, // Puedes cambiar esto si tienes categorías dinámicas
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
