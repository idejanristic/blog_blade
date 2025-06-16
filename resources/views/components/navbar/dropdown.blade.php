@props(['active' => false])

<li class="dropdown {{ $active ? 'active' : 'inactive' }}">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        {{ $currentUser->name }} <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu">
        {{ $slot }}
    </ul>
</li>