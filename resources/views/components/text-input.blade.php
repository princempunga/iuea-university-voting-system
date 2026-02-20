@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'input-institutional']) }}
    style="-webkit-appearance: none;">