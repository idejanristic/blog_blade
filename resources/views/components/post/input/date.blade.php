@props(['disabled' => false])

<input type="date" @disabled($disabled) {{ $attributes->merge(['class' => 'form-control']) }} />