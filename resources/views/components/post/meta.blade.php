@aware(['article'])

<p class="post-meta">Posted by <a
        href="{{ route('public.articles.user', parameters: ['name' => $article->user->name]) }}">{{ $article->user->name }}</a>
    on {{ $article->published_at->format('F j, Y') }}</p>