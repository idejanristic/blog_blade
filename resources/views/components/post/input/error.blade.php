@props(['message'])

@if ($message)
    <span class="help-block">
        <strong class="text-danger">{{ $message }}</strong>
    </span>
@endif