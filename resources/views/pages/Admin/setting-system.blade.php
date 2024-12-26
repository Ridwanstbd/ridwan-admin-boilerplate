<x-Layouts.AdminLayout title="Settings System">
    <x-Layouts.ContainerLayout>
        <div x-data="{ 
            imagePreview: $store.systems.favicon ? '{{ asset('storage/') }}' + $store.systems.favicon : '',
            name: $store.systems.name,
            email: $store.systems.email,
            phone: $store.systems.phone,
            description: $store.systems.description,
            address: $store.systems.address,
            
            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }">
            <form method="POST" action="{{ route('system.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column - Form Fields -->
                    <div>
                        <x-Fragments.Form.FormGroup :message="$errors->first('name')" label="Company Name" for="name">
                            <x-Elements.Form.Input name="name" id="name" x-model="name"/>
                        </x-Fragments.Form.FormGroup>

                        <x-Fragments.Form.FormGroup :message="$errors->first('email')" label="Email" for="email">
                            <x-Elements.Form.Input type="email" name="email" id="email" x-model="email" />
                        </x-Fragments.Form.FormGroup>
        
                        <x-Fragments.Form.FormGroup :message="$errors->first('phone')" label="Phone Number" for="phone">
                            <x-Fragments.Form.PhoneInput name="phone" id="phone" x-model="phone" />
                        </x-Fragments.Form.FormGroup>

                        <x-Fragments.Form.FormGroup :message="$errors->first('description')" label="Description" for="description">
                            <x-Elements.Form.Textarea name="description" id="description" x-model="description"/>
                        </x-Fragments.Form.FormGroup>
        
                        <x-Fragments.Form.FormGroup :message="$errors->first('address')" label="Address" for="address">
                            <x-Elements.Form.Textarea name="address" id="address" x-model="address" />
                        </x-Fragments.Form.FormGroup>

                        <x-Fragments.Form.FormGroup :message="$errors->first('favicon')" label="Favicon" for="favicon">
                            <x-Elements.Form.FileInput name="favicon" id="favicon" accept="image/*" @change="handleFileUpload($event)" />
                        </x-Fragments.Form.FormGroup>
                    </div>
        
                    <!-- Right Column - Image Preview -->
                    <div>
                        <x-Fragments.ImagePreview title="Current Favicon Preview" :image="$systems->favicon" />
                    </div>
                </div>
        
                <!-- Submit Button -->
                <x-Elements.Form.ButtonSubmit>
                    Update System
                </x-Elements.Form.ButtonSubmit>
            </form>
        </div>
    </x-Layouts.ContainerLayout>
</x-Layouts.AdminLayout>