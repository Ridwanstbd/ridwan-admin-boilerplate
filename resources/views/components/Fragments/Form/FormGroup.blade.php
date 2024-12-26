@props(['label', 'for', 'error' => null])
<div class="my-2">
    <x-Elements.Label :for="$for">{{ $label }}</x-Elements.Label>
    {{ $slot }}
    <x-Elements.Form.InputError :message="$error" />
</div>