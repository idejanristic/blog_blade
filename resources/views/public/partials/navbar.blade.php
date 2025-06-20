<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <x-navbar.brand href="{{ route('public.home') }}">demo_blog.rs</x-navbar.brand>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <x-navbar>
                <x-navbar.link href="{{ route('public.home') }}" active="{{ request()->is('/') }}">Home</x-navbar.link>

                <x-navbar.link href="{{ route('public.articles.index') }}"
                    active="{{ request()->is('articles') }}">Blog</x-navbar.link>

                <x-navbar.link href="{{ route('public.about') }}"
                    active="{{ request()->is('about') }}">About</x-navbar.link>

                <x-navbar.link href="{{ route('public.contact') }}"
                    active="{{ request()->is('contact') }}">Contact</x-navbar.link>

                <!-- Authentication Links -->
                @auth
                    <x-navbar.link href="{{ route('public.articles.create') }}"
                        active="{{ request()->is('articles/create') }}">Add article</x-navbar.link>

                    <x-navbar.dropdown active="{{ request()->is('dashboard') }}">
                        <x-navbar.link href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </x-navbar.link>
                        <x-navbar.link href="{{ route('logout') }}">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </x-navbar.link>
                    </x-navbar.dropdown>
                @else
                <x-navbar.link href="{{ url('/login') }}">Login</x-navbar.link>
                <x-navbar.link href="{{ url('/register') }}">Register</x-navbar.link>
                @endif
            </x-navbar>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>