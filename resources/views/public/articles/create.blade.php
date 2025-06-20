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
                        <x-post.input.textarea id="excerpt" name="excerpt" :value="old('excerpt')" rows="2" />
                        <x-post.input.error :message="$errors->first('excerpt')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Published on:</x-post.input.label>
                        <x-post.input.date id="published_at" name="published_at" :value="old('published_at')" />
                        <x-post.input.error :message="$errors->first('published_at')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Tags:</x-post.input.label>
                        <x-post.input.select id="tags" name="tags[]" :value="old('tags')" :opts='$tagList'
                            type="multiple" />
                        <x-post.input.error :message="$errors->first('tags')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.label>Body:</x-post.input.label>
                        <x-post.input.textarea id="body" name="body" :value="old('body')" rows="10" />
                        <x-post.input.error :message="$errors->first('body')" class="mt-2" />
                    </x-post.input.group>

                    <x-post.input.group>
                        <x-post.input.button>Add Article</x-post.input.button>
                    </x-post.input.group>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-slot name="footer">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".selectTags").select2({
                    placeholder: "Select a tag",
                    maximumSelectionLength: 5
                });
            });
        </script>
    </x-slot>
</x-public-layout>