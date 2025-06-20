<!DOCTYPE html>
<html lang="en">

<head>
    @include('public.partials.head', [
        'author' => $author,
    ])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    @include('public.partials.navbar', [
        'title' => $title,
        'description' => $description,
    ])
    <!-- Page Heading -->
    @isset($header)
        {{ $header }}
    @endisset

    <!-- Page Content -->
    {{ $slot }}

    <hr>

@include('public.partials.footer')
    @vite(['resources/js/public.js'])

    <!-- Page Footer -->
    @isset($footer)
        {{ $footer }}
    @endisset

</body>

</html>