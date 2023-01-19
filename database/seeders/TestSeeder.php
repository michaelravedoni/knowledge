<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'MR',
            'email' => 'michael@ravedoni.com',
            'password' => '$2y$10$jhTtt/b/whoOW4xwfIPOqeswi2RDuzMq/UDw3uYHCOMpIeVufqfWK',
            'role' => UserRole::Admin->value,
        ]);

        \App\Models\Project::create([
            'name' => 'Projet A',
            'slug' => 'projet-a',
        ]);

        \App\Models\Project::create([
            'name' => 'Projet B',
            'slug' => 'projet-b',
        ]);

        \App\Models\ArticleCategory::create([
            'name' => ['en' => 'Category A', 'fr' => 'Catégorie A'],
            'slug' => 'category-a',
        ]);

        \App\Models\ArticleCategory::create([
            'name' => ['en' => 'Category B', 'fr' => 'Catégorie B'],
            'slug' => 'category-a',
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article A - How to to this', 'fr' => 'Article A (fr)'],
            'slug' => 'article-a',
            'status' => 'published',
            'category_id' => 1,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article b - Register yourself', 'fr' => 'Article b (fr)'],
            'slug' => 'article-b',
            'status' => 'published',
            'category_id' => 1,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article c - Do this easely on your own and a long title very long too far away'],
            'slug' => 'article-c',
            'status' => 'published',
            'category_id' => 2,
            'project_id' => 1,
        ]);
    }
}
