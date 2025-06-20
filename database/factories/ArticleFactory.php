<?php

namespace Database\Factories;

use App\Enums\ArticleSource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>  User::inRandomOrder()->value(column: 'id'),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->paragraph,
            'body' => $this->faker->paragraphs(nb: 5, asText: true),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'source' => ArticleSource::Seed,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
