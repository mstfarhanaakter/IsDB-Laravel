@extends('layout.app')

@section('content')
<div class="container">
    <h1>Raw Materials</h1>
    <a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Add Raw Material</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Opening Stock</th>
                <th>Current Stock</th>
                <th>Reorder Level</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $material->name }}</td>
                <td>{{ $material->category }}</td>
                <td>{{ $material->unit }}</td>
                <td>{{ $material->opening_stock }}</td>
                <td>{{ $material->current_stock }}</td>
                <td>{{ $material->reorder_level }}</td>
                <td>{{ $material->supplier?->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('materials.edit', $material) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('materials.destroy', $material) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
