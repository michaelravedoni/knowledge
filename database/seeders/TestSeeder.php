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
            'password' => '$2y$10$jhTtt/b/whoOW4xwfIPOqeswi2RDuzMq/UDw3uYHCOMpIeVufqfWK',
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
        ]);

        \App\Models\ArticleCategory::create([
            'name' => ['en' => 'Category B', 'fr' => 'Catégorie B'],
            'slug' => ['en' => 'category-b', 'fr' => 'categorie-b'],
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article A - How to do this', 'fr' => 'Article A (fr)'],
            'slug' => ['en' => 'article-a', 'fr' => 'article-a'],
            'status' => 'published',
            'category_id' => 1,
            'project_id' => 1,
            'content' => [
                "en" => [
                    [
                        "type" => "content",
                        "data" => [
                            "content" => "<p>English paragraph text.</p>"
                        ]
                    ],
                    [
                        "type" => "block",
                        "data" => [
                            "heading" => null,
                            "text" => "<p>Basic block in english</p>",
                            "level" => "basic",
                        ]
                    ]
                ],
                "fr" => [
                    [
                        "type" => "content",
                        "data" => [
                            "content" => "<p>Ligne de texte en français.</p>"
                        ]
                    ],
                    [
                        "type" => "block",
                        "data" => [
                            "heading" => 'Titre du block',
                            "text" => "<p>Bloc d'information en français</p>",
                            "level" => "info",
                        ]
                    ]
                ],
            ],
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article b - Register yourself', 'fr' => 'Article b (fr)'],
            'slug' => ['en' => 'article-b', 'fr' => 'article-b'],
            'status' => 'published',
            'category_id' => 1,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article c - Do this easely on your own and a long title very long too far away'],
            'slug' => ['en' => 'article-c', 'fr' => 'article-c'],
            'status' => 'published',
            'category_id' => 2,
            'project_id' => 1,
        ]);

        \App\Models\Article::create([
            'title' => ['en' => 'Article D - No category'],
            'slug' => ['en' => 'article-d', 'fr' => 'article-d'],
            'status' => 'published',
            'category_id' => null,
            'project_id' => 1,
        ]);
    }
}
