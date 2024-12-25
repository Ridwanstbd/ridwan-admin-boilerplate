{{-- components/Fragments/Sidebar.blade.php --}}
@props(['menuItems'])

<aside :class="$store.sidebar.isOpen ? 'w-64' : 'w-16'" class="fixed top-0 left-0 h-full bg-white shadow-lg transition-all duration-300">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between px-4 py-3 border-b">
        <h1 x-show="$store.sidebar.isOpen" class="font-bold text-lg">{{$systems->name ?? "gagal"}}</h1>
        <button @click="$store.sidebar.toggle()" class="p-1 hover:bg-gray-100 rounded-lg">
            <svg x-show="!$store.sidebar.isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sidebar"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
            <svg x-show="$store.sidebar.isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
    </div>

    <nav class="p-2">
        @foreach ($menuItems as $item)
            <x-Elements.Link 
                href="{{ route($item['route']) }}"
                class="flex items-center p-3 mb-2 hover:bg-gray-100 rounded-lg transition-colors"
            >
                <svg
                    class="w-6 h-6 text-gray-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="{{ $item['icon'] }}"
                    />
                </svg>
                <span x-show="$store.sidebar.isOpen" class="ml-3 text-gray-700">
                    {{ $item['text'] }}
                </span>
            </x-Elements.Link>
        @endforeach
    </nav>

    <!-- Settings Link -->
    @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="absolute bottom-0 left-0 w-full p-2 border-t">
            <x-Elements.Link 
                href="{{ route('admin.settings') }}"
                class="flex items-center p-3 hover:bg-gray-100 rounded-lg transition-colors"
            >
                <svg
                    class="w-6 h-6 text-gray-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                </svg>
                <span x-show="$store.sidebar.isOpen" class="ml-3 text-gray-700">
                    Pengaturan
                </span>
            </x-Elements.Link>
        </div>
    @endif
</aside>