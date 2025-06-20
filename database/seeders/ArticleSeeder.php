<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(count: 300)->create()->each(function ($article): void {
            $tags = Tag::inRandomOrder()->take(value: rand(min: 1, max: 5))->pluck(column: 'id');

            $article->tags()->attach($tags);
        });
    }
}
