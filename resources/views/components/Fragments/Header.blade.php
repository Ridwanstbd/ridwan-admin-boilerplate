<header 
    :class="$store.sidebar.isOpen ? 'ml-64' : 'ml-16'"
    class="bg-white shadow-md fixed top-0 right-0 left-0 z-10 transition-all duration-300"
>
    <div class="py-2 flex items-center justify-end">
        <div class="flex items-center gap-4">
            {{-- Profile Dropdown --}}
            <div x-data="{ isOpen: false }" class="relative pr-8">
                <button 
                    @click="isOpen = !isOpen"
                    class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                >
                @if(Auth::check())
                    <span>{{ $loggedInUser->name }}</span>
                @endif
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-2 h-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                
                <div 
                    x-show="isOpen" 
                    @click.away="isOpen = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2"
                >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    <hr class="my-2">
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>