@props(['trigger'])

<div x-data="{ open: false }">
    <!-- Trigger -->
    <div @click="open = true">
        {{ $trigger }}
    </div>

    <!-- Modal -->
    <div 
        x-show="open" 
        x-cloak 
        class="fixed inset-0 z-50 overflow-y-auto" 
        role="dialog" 
        aria-modal="true">
        
        <x-Elements.ModalBackdrop />

        <div class="flex items-center justify-center min-h-screen p-4">
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full max-w-md bg-white rounded-lg shadow-xl"
                @click.away="open = false">
                
                {{ $slot }}
            </div>
        </div>
    </div>
</div>