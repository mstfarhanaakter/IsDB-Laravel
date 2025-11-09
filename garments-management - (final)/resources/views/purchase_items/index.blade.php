@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Purchase Items</h1>
    <a href="{{ route('purchase-items.create') }}" class="btn btn-primary mb-3">Add Purchase Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->material->name }}</td>
                <td>{{ $item->supplier->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('purchase-items.show', $item) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('purchase-items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('purchase-items.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No purchase items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
