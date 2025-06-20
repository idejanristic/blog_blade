@props(['disabled' => false, 'value', 'opts', 'type' => 'one'])

@php
    $classes = 'form-control';
    if(isset($type) && $type == 'multiple') {
        $classes .= ' selectTags';
    }
@endphp

<select {{ isset($type) && $type == 'multiple' ? 'multiple' : '' }} @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
    @foreach ($opts as $opt)
        <option 
            value="{{ $opt->id }}"
            {{ isset($value) && in_array(needle: $opt->id, haystack: $value) ? 'selected' : '' }}
            >
            {{ $opt->name }}
        </option>
    @endforeach
</select>