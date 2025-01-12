<x-Layouts.AdminLayout title="Pengguna">
    <x-Layouts.Table>
        <x-Fragments.Table.Header>
            <x-Elements.Table.Th class="w-16">No</x-Elements.Table.Th>
            <x-Elements.Table.Th sortable>Nama</x-Elements.Table.Th>
            <x-Elements.Table.Th sortable>Email</x-Elements.Table.Th>
            <x-Elements.Table.Th class="w-48">Aksi</x-Elements.Table.Th>
        </x-Fragments.Table.Header>

        <x-Fragments.Table.Body>
            @forelse($users as $index => $user)
                <tr>
                    <x-Elements.Table.Td>
                        {{ $users->firstItem() + $index }}
                    </x-Elements.Table.Td>
                    <x-Elements.Table.Td>{{ $user->name }}</x-Elements.Table.Td>
                    <x-Elements.Table.Td>{{ $user->email }}</x-Elements.Table.Td>
                    <x-Elements.Table.Td>
                        <div class="flex items-center gap-2">
                            <button @click="$dispatch('open-modal', 'edit-user-{{ $user->id }}')" class="text-blue-600 hover:text-blue-800">Edit</button>
                        </div>
                    </x-Elements.Table.Td>
                    @include('pages.User.Modal.edit', ['user' => $user ])
                </tr>
            @empty
                <x-Elements.Table.Empty colspan="4">
                    <p class="mt-1 text-sm">Belum ada user yang terdaftar.</p>
                </x-Elements.Table.Empty>
            @endforelse
        </x-Fragments.Table.Body>

        <x-slot name="pagination">
            <x-Fragments.Table.Pagination :paginator="$users" />
        </x-slot>
    </x-Layouts.Table>
</x-Layouts.AdminLayout>