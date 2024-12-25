@props(['id', 'ajax', 'columns', 'columnData'])

<table id="{{ $id }}" class="min-w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            @foreach ($columns as $column)
                <th class="border border-gray-300 px-4 py-2">{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#{{ $id }}').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ $ajax }}',
            columns: {!! json_encode($columnData) !!}
        });
    });
</script>