<!DOCTYPE html>
<html lang="en">

<head>
    @include('public.partials.head', [
        'author' => $author,
    ])
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

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Footer -->
    @isset($footer)
        {{ $footer }}
    @endisset

</body>

</html>