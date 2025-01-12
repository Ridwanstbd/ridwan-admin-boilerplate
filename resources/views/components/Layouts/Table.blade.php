{{-- components/Layouts/Table.blade.php --}}
@props(['striped' => false])

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        {{ $slot }}
    </table>
    
    @isset($pagination)
        {{ $pagination }}
    @endisset
</div>
