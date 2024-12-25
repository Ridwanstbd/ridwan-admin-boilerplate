@props(['type' => 'text'])
<input 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'border rounded px-3 py-1']) }}
>