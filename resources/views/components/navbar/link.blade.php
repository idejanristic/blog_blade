@props(['active' => false])

<li class="{{ $active ? 'active' : 'inactive' }}">
    <a href="{{ $attributes->get('href') }}" aria-current="{{ $active ? 'page' : 'false' }}">
        {{$slot}}
    </a>
</li>