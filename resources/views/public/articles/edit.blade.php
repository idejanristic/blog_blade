<x-public-layout title="Edit article" desciption='Edit article'>
    <x-slot name="header">
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('{{ url('img/home-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Edit</h1>
                            <hr class="small">
                            <span class="post-meta">
                                {{ $article->title }}
                            </span>
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
                <form method="POST" action="{{ route('public.articles.update', ['article' => $article->slug]) }}">
                    @method('PATCH')
                    @csrf
                    <x-post.input.group>
                        <x-post.input.label>Title:</x-post.input.label>
                        <x-post.input.text id="title" name="title" :value="old('title', $article->title)" autofocus
                            autocomplete="title" />
                        <x-post.input.error :message="$errors->first('title')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Excerpt:</x-post.input.label>
                        <x-post.input.textarea id="excerpt" name="excerpt" :value="old('excerpt', $article->excerpt)"
                            rows="2" id="editor" />
                        <x-post.input.error :message="$errors->first('excerpt')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Published on:</x-post.input.label>
                        <x-post.input.date id="published_at" name="published_at" :value="old('published_at', $article->published_at->format('Y-m-d'))" />
                        <x-post.input.error :message="$errors->first('published_at')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Tags:</x-post.input.label>
                        <x-post.input.select id="tags" name="tags[]" :value="old('tags', $article->tags->pluck('id')->toArray())" :opts='$tagList' type="multiple" />
                        <x-post.input.error :message="$errors->first('tags')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Body:</x-post.input.label>
                        <x-post.input.textarea id="body" name="body" :value="old('body', $article->body)" rows="10"
                            id="editor2" />
                        <x-post.input.error :message="$errors->first('body')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.button>Update Article</x-post.input.button>
                    </x-post.input.group>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-slot name="footer">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".selectTags").select2({
                    placeholder: "Select a tag",
                    maximumSelectionLength: 5
                });

                // var quill = new Quill('#editor', {
                //     theme: 'snow'
                // });

                var quill2 = new Quill('#editor2', {
                    theme: 'snow'
                });
            });
        </script>
    </x-slot>
</x-public-layout>