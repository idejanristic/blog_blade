@props(['disabled' => false])

<input type="text" @disabled($disabled) {{ $attributes->merge(['class' => 'form-control']) }} />