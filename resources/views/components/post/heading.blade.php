@props(['article', 'actions' => false])

<div class="post-heading">
    <h1>{{ $article->title }}</h1>
    <p class="post-meta">Posted by <a
            href="{{ route('public.articles.user', ['user' => $article->user->id]) }}">{{ $article->user->name }}</a>
        on {{ $article->published_at->format('F j, Y') }}</p>

    @if($actions)
        <a class="btn btn-default btn-xs pull-left"
            href="{{ route('public.articles.edit', ['article' => $article->slug]) }}">
            <i class="fa fa-edit"></i> Update</a>
        <form method="POST" action="{{ route('public.articles.destroy', ['article' => $article->slug]) }}">
            @method('DELETE')
            @csrf
            <button type='submit' class='btn btn-danger btn-xs pull-left'>
                <i class="fa fa-trash"></i>
                Delete
            </button>
        </form>
    @endif
</div>