@props([
    'name' => 'email',
    'id' => 'email',
    'label' => 'Email',
    'placeholder' => 'Email'
])

<div>
    <x-Elements.Label for="{{$id}}">
        {{$label}}
    </x-Elements.Label>
    <x-Elements.Form.Input 
        type="email"
        :id="$id"
        :name="$name"
        :placeholder="$placeholder"
        {{ $attributes }}
    />
    <x-Elements.Form.InputError :message="$errors->first($name)"/>
</div>