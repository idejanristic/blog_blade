<?php

namespace App\DataTransverObjects;

use App\Enums\ArticleSource;
use App\Http\Requests\Articles\ArticleRequest;
use Carbon\Carbon;

class ArticleDto
{
    public readonly string $title;
    public readonly string $excerpt;
    public readonly string $body;
    public readonly Carbon $published_at;
    public readonly ArticleSource $source;


    public function __construct(
        string $title,
        string $excerpt,
        string $body,
        string $published_at,
        ArticleSource $articleSource
    ) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->published_at = Carbon::parse($published_at);
        $this->source = $articleSource;
    }

    public static function fromAppRequest(ArticleRequest $articleRequest): ArticleDto
    {
        return new self(
            title: $articleRequest->validated(key: 'title'),
            excerpt: $articleRequest->validated(key: 'excerpt'),
            body: $articleRequest->validated(key: 'body'),
            published_at: $articleRequest->validated(key: 'published_at'),
            articleSource: ArticleSource::App
        );
    }
}
