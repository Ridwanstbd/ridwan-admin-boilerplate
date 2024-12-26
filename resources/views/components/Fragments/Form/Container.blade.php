@props([
    'action',
    'method',
    'id',
])
<form 
    action="{{route($action)}}" 
    method="POST" 
    id="{{$id}}"
    {{$attributes->merge([
    'class'=>"space-y-6"
    ])}}>
    @csrf
    @method('{{$method}}')
{{$slot}}
</form>