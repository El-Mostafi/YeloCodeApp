<div wire:poll>
<table class="min-w-full divide-y divide-gray-200 mt-4 text-center mx-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($todos as $todo)
        <tr>
            <th scope="row" class="px-6 py-4 whitespace-nowrap">{{ $todo->id }}</th>
            <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $todo->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $todo->created_at->toDayDateTimeString() }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $todo->image }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-25 mx-auto"><span>{{$todos->links()}}</span></div>

</div>
