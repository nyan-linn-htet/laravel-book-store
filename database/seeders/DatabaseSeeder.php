<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->create([
            'name' => 'Technology',
            'status' => 'about Tech',
        ]);
        Category::factory()->create([
            'name' => 'History',
            'status' => 'about historic events',
        ]);
        Category::factory()->create([
            'name' => 'Mythology',
            'status' => 'about mythic events',
        ]);
        Category::factory()->create([
            'name' => 'Fiction',
        ]);
        Category::factory()->create([
            'name' => 'Comic',
        ]);
        Book::factory()->create([
            'title' => 'Professional Web Developer',
            'author' => 'Ei Maung',
            'summary' => 'about web development',
            'price' => 30000,
            'category_id' => 1,
        ]);
        Book::factory()->create([
            'title' => 'Bootstrap',
            'author' => 'Ei Maung',
            'summary' => 'about bootstap',
            'price' => 5000,
            'category_id' => 1,
        ]);
    }
}
