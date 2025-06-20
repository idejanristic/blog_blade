<?php

namespace App\Services;

use App\Models\Article;
use App\DataTransverObjects\ArticleDto;
use App\Repositories\ArticleRepository;

class ArticleService
{
    private ArticleRepository $repo;

    public function __construct()
    {
        $this->repo = new ArticleRepository();
    }

    /**
     * 
     * @param \App\DataTransverObjects\ArticleDto $dto
     * @return bool
     */
    public function create(ArticleDto $dto): bool
    {
        $user = auth()->user();

        $status = $this->repo->store(
            user_id: $user->id,
            dto: $dto
        );

        return $status;
    }

    /**
     * 
     * @param \App\Models\Article $article
     * @param \App\DataTransverObjects\ArticleDto $dto
     * @return bool
     */
    public function update(Article $article, ArticleDto $dto): bool
    {
        return $this->repo->update(
            article: $article,
            dto: $dto
        );
    }

    /**
     * 
     * @param \App\Models\Article $article
     * @return bool|null
     */
    public function delete(Article $article): bool|null
    {
        return $this->repo->delete(article: $article);
    }
}
