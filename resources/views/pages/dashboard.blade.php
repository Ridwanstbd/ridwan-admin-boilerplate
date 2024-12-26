{{-- views/pages/admin/dashboard.blade.php --}}
<x-Layouts.AdminLayout title="Beranda">
    <x-Layouts.Modal name="test">
        <x-slot name="trigger">
            <x-elements.button>
                Buka Modal
            </x-elements.button>
        </x-slot>
    
        <x-Fragments.ModalHeader title="Judul Modal" />
        
        <div class="p-4">
            <p class="text-gray-600">
                Ini adalah konten modal. Anda dapat menambahkan apapun di sini.
            </p>
        </div>
        
        <x-Fragments.ModalFooter
            cancel-text="Kembali"
            submit-text="Konfirmasi"
            submit-variant="primary"
            @click="saveData()">
        </x-Fragments.ModalFooter>
    </x-Layouts.Modal>
</x-Layouts.AdminLayout>