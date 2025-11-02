@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">📦 All Supplies</h2>
        <a href="{{ route('supplies.create') }}" class="btn btn-primary">+ Add New Supply</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($supplies->isEmpty())
        <div class="alert alert-info">
            No supplies found. <a href="{{ route('supplies.create') }}">Create one now</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Supplier</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supplies as $supply)
                        <tr>
                            <td>{{ $supply->id }}</td>
                            <td>{{ $supply->supplier->name ?? 'N/A' }}</td>
                            <td>{{ $supply->name }}</td>
                            <td>{{ $supply->quantity }}</td>
                            <td>${{ number_format($supply->price, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('supplies.show', $supply->id) }}" class="btn btn-sm btn-outline-info">👁 View</a>
                                <a href="{{ route('supplies.edit', $supply->id) }}" class="btn btn-sm btn-outline-warning">✏️ Edit</a>
                                <form action="{{ route('supplies.destroy', $supply->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this supply?')">🗑 Delete</button>
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
