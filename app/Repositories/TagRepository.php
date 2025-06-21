<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class TagRepository
{
    public function allTags(): Collection
    {
        return Tag::withCount(relations: 'articles')
            ->latest()
            ->get();
    }

    /**
     * 
     * @param int $tag_id
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function allPublishedArticlesForTag(int $tag_id, int $perPage): Paginator
    {

        return Article::with('user')
            ->whereHas(
                relation: 'tags',
                callback: function ($query) use ($tag_id) {
                    $query->where('tags.id', $tag_id);
                }
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
