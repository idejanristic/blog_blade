<!DOCTYPE html>
<html lang="en">

<head>
    @include('public.partials.head')
</head>

<body>

    @include('public.partials.navbar')


    <!-- Page Heading -->
    @isset($header)
        {{ $header }}
    @endisset

    <!-- Page Content -->
    {{ $slot }}

    <hr>

    @include('public.partials.footer')

    <!-- Page Footer -->
    @isset($footer)
        {{ $footer }}
    @endisset

</body>

</html>