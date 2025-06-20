<x-public-layout title="Create article" desciption='Create article'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Create a new Article</h1>
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
                <form method="POST" action="{{ route('public.articles.store') }}">
                    @csrf
                    <x-post.input.group>
                        <x-post.input.label>Title:</x-post.input.label>
                        <x-post.input.text id="title" name="title" :value="old('title')" autofocus
                            autocomplete="title" />
                        <x-post.input.error :message="$errors->first('title')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Excerpt:</x-post.input.label>
                        <x-post.input.textarea id="excerpt" name="excerpt" :value="old('excerpt')" rows="3" />
                        <x-post.input.error :message="$errors->first('excerpt')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Published on:</x-post.input.label>
                        <x-post.input.date id="published_at" name="published_at" :value="old('published_at')" />
                        <x-post.input.error :message="$errors->first('published_at')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Body:</x-post.input.label>
                        <x-post.input.textarea id="body" name="body" :value="old('body')" rows="6" />
                        <x-post.input.error :message="$errors->first('body')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.button>Add Article</x-post.input.button>
                    </x-post.input.group>
                </form>
            </div>
        </div>
    </div>
</x-public-layout>