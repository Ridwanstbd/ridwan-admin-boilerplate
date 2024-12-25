@props(['title'])

<div class="flex items-center justify-between p-4 border-b">
    <h3 class="text-xl font-semibold text-gray-900">
        {{ $title }}
    </h3>
    <button 
        @click="open = false" 
        class="text-gray-400 hover:text-gray-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
