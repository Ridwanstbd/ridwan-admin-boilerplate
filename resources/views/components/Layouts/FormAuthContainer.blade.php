@props(['title'])
<div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            {{$title}}
        </h2>
    </div>
    {{$slot}}
</div>