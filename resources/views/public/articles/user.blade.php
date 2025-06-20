<x-public-layout title="articles" desciption='All articles published on demo_blog.rs'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Articles</h1>
                            <hr class="small">
                            <span class="subheading"> written by {{ $user->name }}</span>
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
                            <x-post.link />
                            <x-post.meta :showUser="false" />
                        </x-post>
                        <hr>
                    @endforeach

                    <x-page.pagination :model="$articles" />
                @endempty
            </div>
        </div>
    </div>
</x-public-layout>