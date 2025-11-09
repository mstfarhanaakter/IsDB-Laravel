@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Materials</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Add New Material</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material Name</th>
                <th>Unit</th>
                <th>Current Stock</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->unit }}</td>
                    <td>{{ $material->current_stock }}</td>
                    <td>
                        {{ $material->supplier ? $material->supplier->name : 'No Supplier' }}
                    </td>
                    <td>
                        <a href="{{ route('materials.show', $material->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No materials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
