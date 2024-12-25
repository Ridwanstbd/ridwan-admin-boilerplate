@props([
    'showCancelButton' => true,
    'showSubmitButton' => true,
    'cancelText' => 'Batal',
    'submitText' => 'Simpan',
    'cancelVariant' => 'secondary',
    'submitVariant' => 'primary'
])

<div class="flex justify-end gap-2 p-4 bg-gray-50 border-t rounded-b-lg">
    @if($showCancelButton)
        <x-Elements.Button 
            @click="open = false"
            :variant="$cancelVariant">
            {{ $cancelText }}
        </x-Elements.Button>
    @endif

    @if($showSubmitButton)
        <x-Elements.Button 
            :variant="$submitVariant"
            {{ $attributes }}>
            {{ $submitText }}
        </x-Elements.Button>
    @endif

    {{ $slot }}
</div>
