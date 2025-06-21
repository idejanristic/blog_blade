<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Pagination\Paginator;
use App\DataTransverObjects\ArticleDto;

class ArticleRepository
{
    public function __construct() {}

    /**
     * 
     * @param integer $user_id
     * @param ArticleDto $dto
     * @return boolean
     */
    public function store(int $user_id, ArticleDto $dto): bool
    {
        $article = new Article();

        $article->fill(
            attributes: [
                'title' => $dto->title,
                'excerpt' => $dto->excerpt,
                'body' => $dto->body,
                'published_at' => $dto->published_at,
                'source' => $dto->source,
                'user_id' => $user_id
            ]
        );

        $status = $article->save();

        if (isset($status)) {
            if (isset($dto->tags) && count(value: $dto->tags) > 0) {
                $article->tags()->sync(ids: $dto->tags);
            }
        }

        return $article->save();
    }

    /**
     * 
     * @param \App\Models\Article $article
     * @param \App\DataTransverObjects\ArticleDto $dto
     * @return bool
     */
    public function update(Article $article, ArticleDto $dto): bool
    {
        $status =  $article->update(
            attributes: [
                'title' => $dto->title,
                'excerpt' => $dto->excerpt,
                'body' => $dto->body,
                'published_at' => $dto->published_at,
                'source' => $dto->source
            ]
        );

        if ($status) {
            if (isset($dto->tags) && count(value: $dto->tags) > 0) {
                $article->tags()->sync(ids: $dto->tags);
            }
        }

        return $status;
    }

    /**
     * 
     * @param \App\Models\Article $article
     * @return bool|null
     */
    public function delete(Article $article): bool|null
    {
        return $article->delete();
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function allPublishedArticles(int $perPage): Paginator
    {
        return Article::with(relations: 'user')
            ->where(
                column: 'published_at',
                operator: '<=',
                value: Carbon::now()
            )
            ->latest()
            ->simplePaginate(perPage: $perPage);
    }

    /**
     * 
     * @param int $user_id
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function allPublishedArticlesForUser(int $user_id, int $perPage): Paginator
    {
        return Article::where(
            column: 'user_id',
            operator: $user_id
        )
            ->where(
                column: 'published_at',
                operator: '<=',
                value: Carbon::now()
            )
            ->latest()
            ->simplePaginate(perPage: $perPage);
    }
}
