@aware(['article'])

<a href="{{ route('public.articles.show', ['article' => $article->slug]) }}">
    <h2 class="post-title">
        {{ $article->title }}
    </h2>
    <h3 class="post-subtitle">
        {{ $article->excerpt }}
    </h3>
</a>