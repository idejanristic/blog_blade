<?php

namespace App\Http\Controllers\Public;

use App\Repositories\TagRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagsController extends Controller
{
    public function __construct(
        public TagRepository $tagRepository
    ) {
        view()->share(key: 'currentUser', value: Auth::user());
    }

    /**
     * Display a listing of the tag
     * 
     * @return View
     */
    public function index(): View
    {
        $tags = $this->tagRepository->allTags();

        return view(
            view: 'public.tags.index',
            data: [
                'tags' => $tags
            ]
        );
    }

    public function articles(Tag $tag): View
    {
        $articles = $this->tagRepository->allPublishedArticlesForTag(
            tag_id: $tag->id,
            perPage: 5
        );

        return view(
            view: 'public.tags.articles',
            data: [
                'tag' => $tag,
                'articles' => $articles
            ]
        );
    }
}
