<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CategorySeeder::class);
        // $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
        \App\Models\Post::factory()->count(50)->create();

    }
     
}
