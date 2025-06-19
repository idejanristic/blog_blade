<x-public-layout title="articles" desciption='All articles published on demo_blog.rs'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <hr class="small">
                            <span class="subheading">All articles from The clean blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </x-slot>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @empty($articles)
                    There are no posts.
                @else
                    @foreach ($articles as $article)
                        <x-post :article="$article">
                            <x-post.link></x-post.link>
                            <x-post.meta></x-post.meta>
                        </x-post>
                        <hr>
                    @endforeach

                    <ul class="pager">
                        @if($articles->onFirstPage())
                            <li class="prev pull-left disabled:">
                                <span class="page-link">&larr; Newer Posts</span>
                            </li>
                        @else
                            <li class="prev pull-left">
                                <a href="{{ $articles->previousPageUrl() }}">&larr; Newer Posts </a>
                            </li>
                        @endif

                        @if($articles->hasMorePages())
                            <li class="next pull-right">
                                <a href="{{ $articles->nextPageUrl() }}"> Older Posts &rarr;</a>
                            </li>
                        @else
                            <li class="next pull-right disabled:">
                                <span class="page-link">Older Posts &rarr;</span>
                            </li>

                        @endif
                    </ul>

                @endempty
            </div>
        </div>
    </div>
</x-public-layout>