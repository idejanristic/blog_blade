<x-public-layout title="tags" desciption='All tags on demo_blog.rs'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Tags</h1>
                            <hr class="small">
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
                    There are no tags.
                @else
                <div>
                    @foreach($tags as $tag)
                        <a class="btn btn-default" href="{{ route('public.tags.articles', ['slug' => $tag->slug]) }}">
                            <i class="fa fa-tag" aria-hidden="true"></i> {{ $tag->name }}
                            <sup>
                                ({{ $tag->articles_count }})
                            </sup>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-public-layout>