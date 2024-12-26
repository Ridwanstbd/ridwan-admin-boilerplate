<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-Elements.Head :title="$title ?? 'Login'" />

<body class="bg-gray-200">
    <div class="min-h-screen flex items-center justify-center">
        {{$slot}}
    </div>
</body>
</html>