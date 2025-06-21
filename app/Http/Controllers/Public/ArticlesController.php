<?php

namespace App\Http\Controllers\Public;

use Auth;
use App\Models\User;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataTransverObjects\ArticleDto;
use App\Repositories\ArticleRepository;
use App\Http\Requests\Articles\ArticleRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticlesController extends Controller
{
    use AuthorizesRequests;
    public function __construct(
        public ArticleService $articleService,
        public ArticleRepository $articleRepository
    ) {
        view()->share(key: 'currentUser', value: Auth::user());
        view()->share(key: 'tagList', value: Tag::all());
    }
    /**
     * Display a listing of the articles
     * 
     * @return View
     */
    public function index(): View
    {
        $articles = $this->articleRepository->allPublishedArticles(
            perPage: 10
        );

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
        $articles = $this->articleRepository->allPublishedArticlesForUser(
            user_id: $user->id,
            perPage: 10
        );

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
        return view(view: 'public.articles.create');
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param \App\Http\Requests\Articles\ArticleRequest $articleRequest
     * @return mixed|RedirectResponse
     */
    public function store(ArticleRequest $articleRequest): RedirectResponse
    {
        $this->articleService->create(
            dto: ArticleDto::fromAppRequest(
                articleRequest: $articleRequest
            )
        );

        return redirect()->route(route: 'public.articles.index');
    }

    /**
     * Display the specified resource
     * 
     * @param \App\Models\Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        $article->load(
            relations: ['tags' => function ($query): void {
                $query->withCount('articles');
            }]
        );

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
        $this->authorize(
            ability: "edit",
            arguments: $article
        );

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
        $this->authorize(
            ability: "update",
            arguments: $article
        );

        $this->articleService->update(
            article: $article,
            dto: ArticleDto::fromAppRequest(
                articleRequest: $articleRequest
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
        $this->authorize(
            ability: "delete",
            arguments: $article
        );

        $this->articleService->delete($article);

        return redirect()->route(route: 'public.articles.index');
    }
}
