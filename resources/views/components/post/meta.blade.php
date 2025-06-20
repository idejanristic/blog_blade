@aware(['article', 'showUser' => true])

@if($showUser)
    <p class="post-meta">Posted by <a
            href="{{ route('public.articles.user', parameters: ['user' => $article->user->id]) }}">{{ $article->user->name }}</a>
        on {{ $article->published_at->format('F j, Y') }}</p>
@else
    <p class="post-meta">Posted on {{ $article->published_at->format('F j, Y') }}</p>
@endif