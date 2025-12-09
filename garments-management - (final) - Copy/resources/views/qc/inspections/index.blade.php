@extends('layouts.app')

@section('title', 'Inspections')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Inspections</h1>
        <a href="{{ route('qc.inspections.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add New Inspection</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Production</th>
                    <th class="px-4 py-2 border">Inspector</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inspections as $inspection)
                    <tr class="border-b">
                        <td class="px-4 py-2 border">{{ $inspection->id }}</td>
                        <td class="px-4 py-2 border">{{ $inspection->production->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $inspection->inspector_name }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($inspection->inspection_date)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 border">
                            @if($inspection->status=='passed')
                                <span class="text-green-600 font-semibold">Passed</span>
                            @elseif($inspection->status=='failed')
                                <span class="text-red-600 font-semibold">Failed</span>
                            @else
                                <span class="text-yellow-600 font-semibold">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('qc.inspections.show', $inspection->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('qc.inspections.edit', $inspection->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('qc.inspections.destroy', $inspection->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 border text-center text-gray-500">No inspections found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $inspections->links() }}
    </div>
</div>
@endsection
