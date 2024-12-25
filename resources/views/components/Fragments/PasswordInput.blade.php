@props([
    'name' => 'password',
    'id' => 'password',
    'label' => 'Password',
    'placeholder' => 'Password'
])

<div>
    <x-Elements.Label for="{{$id}}">
        {{$label}}
    </x-Elements.Label>
    <x-Elements.Form.Input 
        type="password"
        :id="$id"
        :name="$name"
        :placeholder="$placeholder"
        {{ $attributes }}
    />
    <x-Elements.Form.InputError :message="$errors->first($name)" />
</div>