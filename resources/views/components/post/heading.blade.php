@props(['article'])

<div class="post-heading">
    <h1>{{ $article->title }}</h1>
    <p class="post-meta">Posted by <a
            href="{{ route('public.articles.user', ['user' => $article->user->id]) }}">{{ $article->user->name }}</a>
        on {{ $article->published_at->format('F j, Y') }}</p>
</div>