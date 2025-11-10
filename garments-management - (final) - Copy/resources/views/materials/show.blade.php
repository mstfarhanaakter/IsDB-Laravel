@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Material Details</h1>

    <div class="card">
        <div class="card-header">
            <strong>{{ $material->name }}</strong>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $material->id }}</p>
            <p><strong>Unit:</strong> {{ $material->unit }}</p>
            <p><strong>Current Stock:</strong> {{ $material->current_stock }}</p>
            <p><strong>Supplier:</strong> {{ $material->supplier ? $material->supplier->name : 'No Supplier' }}</p>
            <p><strong>Created At:</strong> {{ $material->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $material->updated_at->format('d M Y, H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('materials.index') }}" class="btn btn-secondary">Back</a>

            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
