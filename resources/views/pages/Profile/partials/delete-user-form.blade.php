<section class="py-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-Elements.Button 
        variant="danger" 
        class="mt-2"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Hapus Akun') }}</x-Elements.Button>

    <x-Layouts.Modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>
            <x-Fragments.Form.FormGroup :message="$errors->userDeletion->get('password')" for="password" class="sr-only" label="Password">
                <x-Elements.Form.Input id="password" type="password" name="password" placeholder="{{ __('Password') }}" />
            </x-Fragments.Form.FormGroup>
            
            <div class="mt-6 flex justify-end gap-2">
                <x-Elements.Button variant="secondary" x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-Elements.Button>

                <x-Elements.Button variant="danger" type="submit">
                    {{ __('Tetap Hapus Akun') }}
                </x-Elements.Button>
            </div>
        </form>
    </x-Layouts.Modal>
</section>
