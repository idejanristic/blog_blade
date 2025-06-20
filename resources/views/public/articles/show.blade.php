@php
    use Illuminate\Support\Str;

    $shortTitle = Str::limit(value: $article->title, limit: 17, end: '...');
@endphp

<x-public-layout title="{{ $shortTitle }}" desciption='{{ $article->title }}'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/post-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <x-post.heading :article="$article" :actions="true"></x-post.heading>
                    </div>
                </div>
            </div>
        </header>
    </x-slot>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @unless($article->tags->isEmpty())
                    <h4>Tags:</h4>
                    <div>
                        @foreach($article->tags as $tag)
                            <a href="#">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <br />
                @endunless
                {{ $article->body }}
            </div>
        </div>
    </div>
</x-public-layout>