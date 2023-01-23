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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => UserRole::Admin->value,
        ]);

        \App\Models\Project::create([
            'name' => 'Projet A',
            'slug' => 'projet-a',
            'description' => ['en' => 'Project A description', 'fr' => 'Description du projet A'],
        ]);

        \App\Models\Project::create([
            'name' => 'Projet B',
            'slug' => 'projet-b',
        ]);

        \App\Models\ArticleCategory::create([
            'name' => ['en' => 'Category A', 'fr' => 'Catégorie A'],
            'slug' => ['en' => 'category-a', 'fr' => 'categorie-a'],
            'project_id' => 1,
        ]);

        \App\Models\ArticleCategory::create([
            'name' => ['en' => 'Category B', 'fr' => 'Catégorie B'],
            'slug' => ['en' => 'category-b', 'fr' => 'categorie-b'],
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article A - How to do this', 'fr' => 'Article A (fr)'],
            'slug' => ['en' => 'article-a', 'fr' => 'article-a'],
            'published' => true,
            'category_id' => 1,
            'project_id' => 1,
            'content' => [
                "en" => [
                    "time" => 1674316697592,
                    "blocks" => [
                        [
                            "id" => "jSOnhes_cE",
                            "type" => "paragraph",
                            "data" => [
                                "text" => "English paragraph text."
                            ]
                        ],
                        [
                            "id" => "b1C8VbTKwK",
                            "type" => "quote",
                            "data" => [
                                "caption" => null,
                                "text" => "Basic block in english",
                            ]
                        ]
                    ]
                ],
                "fr" => [
                    "time" => 1674316697592,
                    "blocks" => [
                        [
                            "id" => "jSOnhes_cE",
                            "type" => "paragraph",
                            "data" => [
                                "text" => "Ligne de texte en français."
                            ]
                        ],
                        [
                            "id" => "b1C8VbTKwK",
                            "type" => "quote",
                            "data" => [
                                "caption" => null,
                                "text" => "Bloc d'information en français",
                            ]
                        ]
                    ]
                ],
            ],
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article b - Register yourself', 'fr' => 'Article b (fr)'],
            'slug' => ['en' => 'article-b', 'fr' => 'article-b'],
            'published' => true,
            'category_id' => 1,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article c - Do this easely on your own and a long title very long too far away'],
            'slug' => ['en' => 'article-c', 'fr' => 'article-c'],
            'published' => true,
            'category_id' => 2,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article D - No category'],
            'slug' => ['en' => 'article-d', 'fr' => 'article-d'],
            'published' => false,
            'category_id' => null,
            'project_id' => 1,
        ]);
    }
}
