<?php

namespace App\Http\Controllers\Public;

use Auth;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleRequest;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    public function __construct()
    {
        view()->share(key: 'currentUser', value: Auth::user());
    }
    /**
     * Display a listing of the articles
     * 
     * @return View
     */
    public function index(): View
    {
        $articles = Article::with(relations: 'user')
            ->latest()
            ->simplePaginate(perPage: 10);

        return view(
            view: 'public.articles.index',
            data: [
                'articles' => $articles
            ]
        );
    }

    /**
     * Display a listing of the article that written by a user
     * 
     * @param \App\Models\User $user
     * @return View
     */
    public function user(User $user): View
    {
        $articles = $user->articles()
            ->latest()
            ->simplePaginate(perPage: 10);

        return view(
            view: 'public.articles.user',
            data: [
                'articles' => $articles,
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('public.articles.create');
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param \App\Http\Requests\Articles\ArticleRequest $articleRequest
     * @return mixed|RedirectResponse
     */
    public function store(ArticleRequest $articleRequest): RedirectResponse
    {
        auth()->user()->articles()->create(
            attributes: $articleRequest->only(
                keys: [
                    'title',
                    'excerpt',
                    'body',
                    'published_at'
                ]
            )
        );

        return redirect()->route(route: 'public.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view(
            view: 'public.articles.show',
            data: [
                'article' => $article
            ]
        );
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param \App\Models\Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return view(
            view: 'public.articles.edit',
            data: [
                'article' => $article
            ]
        );
    }

    /**
     * Update the specified resource in storage
     * 
     * @param \App\Http\Requests\Articles\ArticleRequest $articleRequest
     * @param \App\Models\Article $article
     * @return mixed|RedirectResponse
     */
    public function update(ArticleRequest $articleRequest, Article $article): RedirectResponse
    {
        $article->update(
            attributes: $articleRequest->only(
                keys: [
                    'title',
                    'excerpt',
                    'body',
                    'published_at'
                ]
            )
        );

        return redirect()->route(route: 'public.articles.index');
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param \App\Models\Article $article
     * @return mixed|RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route(route: 'public.articles.index');
    }
}
