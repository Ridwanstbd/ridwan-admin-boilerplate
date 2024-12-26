<x-Layouts.AdminLayout title="Pengguna">
    <x-Layouts.table>
        <x-Fragments.Table.Header>
            <x-Elements.Table.th class="w-16">No</x-Elements.Table.th>
            <x-Elements.Table.th sortable>Nama</x-Elements.Table.th>
            <x-Elements.Table.th sortable>Email</x-Elements.Table.th>
            <x-Elements.Table.th class="w-48">Aksi</x-Elements.Table.th>
        </x-Fragments.Table.Header>

        <x-Fragments.Table.Body>
            @forelse($users as $index => $user)
                <tr>
                    <x-Elements.Table.td>
                        {{ $users->firstItem() + $index }}
                    </x-Elements.Table.td>
                    <x-Elements.Table.td>{{ $user->name }}</x-Elements.Table.td>
                    <x-Elements.Table.td>{{ $user->email }}</x-Elements.Table.td>
                    <x-Elements.Table.td>
                        <div class="flex items-center gap-2">
                            @include('pages.User.modal.show')
                        </div>
                    </x-Elements.Table.td>
                </tr>
            @empty
                <x-Elements.Table.empty colspan="4">
                    <p class="mt-1 text-sm">Belum ada user yang terdaftar.</p>
                </x-Elements.Table.empty>
            @endforelse
        </x-Fragments.Table.Body>

        <x-slot name="pagination">
            <x-Fragments.Table.Pagination :paginator="$users" />
        </x-slot>
    </x-Layouts.table>
</x-Layouts.AdminLayout>