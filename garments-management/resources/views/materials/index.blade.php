@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Materials</h2>
        <a href="{{ route('materials.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Material
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Opening Stock</th>
                    <th scope="col">Current Stock</th>
                    <th scope="col">Reorder Level</th>
                    <th scope="col">Supplier</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materials as $material)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material->category }}</td>
                        <td>{{ $material->unit }}</td>
                        <td>{{ number_format($material->opening_stock, 2) }}</td>
                        <td>{{ number_format($material->current_stock, 2) }}</td>
                        <td>{{ number_format($material->reorder_level, 2) }}</td>
                        <td>{{ $material->supplier?->name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <a href="{{ route('materials.edit', $material) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('materials.destroy', $material) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this material?')" 
                                    title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">No materials found. <a href="{{ route('materials.create') }}">Add a new material</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
