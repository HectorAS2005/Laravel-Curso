<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Título de prueba',
            'slug' => 'titulo-de-prueba',
            'content' => 'Contenido de prueba',
            'description' => 'Descripción de prueba',
            'posted' => 'no',
            'image' => 'imagen.jpg',
            'category_id' => 1, // Asegúrate de que esta categoría exista
        ]);
    }
}
