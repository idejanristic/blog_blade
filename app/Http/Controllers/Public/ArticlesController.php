<?php

namespace App\Http\Controllers\Public;

use Auth;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

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
        $articles = Article::with(relations: 'user')->simplePaginate(perPage: 10);

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
