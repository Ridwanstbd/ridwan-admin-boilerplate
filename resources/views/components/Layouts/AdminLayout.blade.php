<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-Elements.Head :title="$title ?? 'Admin Dashboard'" />

<body class="bg-gray-200">
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                isOpen: window.innerWidth >= 768,
                toggle() {
                    this.isOpen = !this.isOpen;
                }
            });

            window.addEventListener('resize', () => {
                Alpine.store('sidebar').isOpen = window.innerWidth >= 768;
            });

            Alpine.store('systems', @json($systems));
        });
    </script>

    @php
        $jsonPath = public_path('json/menu-items.json');
        $menuItems = json_decode(file_get_contents($jsonPath), true)['menuItems'];
        $systems = [];
    @endphp

    <div x-data="{ isOpen: true }">
        <x-Layouts.Sidebar :menuItems="$menuItems" />
        <x-Layouts.Header :title="$title ?? 'Admin Dashboard'" />
        <main 
            :class="$store.sidebar.isOpen ? 'ml-64' : 'ml-16'" 
            class="transition-all duration-300"
        >
            <div class="pt-16 px-4">
                <h1 class="text-xl font-semibold py-2">{{ $title ?? 'Admin Dashboard' }}</h1>
                <div class="bg-white p-4 rounded-lg shadow">
                    {{$slot}}
                </div>
            </div>
        </main>
    </div>
</body>
</html>