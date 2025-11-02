@extends('layout.app') <!-- Adjust according to your main layout -->

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">🏭 All Suppliers</h2>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Add New Supplier</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($suppliers->isEmpty())
        <div class="alert alert-info">
            No suppliers found. <a href="{{ route('suppliers.create') }}">Create one now</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email ?? 'N/A' }}</td>
                            <td>{{ $supplier->phone ?? 'N/A' }}</td>
                            <td>{{ $supplier->address ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-outline-info">👁 View</a>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-outline-warning">✏️ Edit</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">
                                        🗑 Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
