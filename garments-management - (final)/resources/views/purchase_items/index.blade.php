@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Purchase Items</h1>
        <a href="{{ route('purchase-items.create') }}" class="btn btn-primary">Add Purchase Item</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-bordered align-middle text-center mb-0">
            <thead class="table-dark text-uppercase">
                <tr>
                    <th>#</th>
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
                    @php
                        $statusClass = match($item->status) {
                            'pending' => 'bg-warning text-dark',
                            'approved' => 'bg-success text-white',
                            'rejected' => 'bg-danger text-white',
                            default => 'bg-secondary text-white'
                        };
                    @endphp
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $item->material->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->unit_price, 2) }}</td>
                        <td>{{ number_format($item->total, 2) }}</td>
                        <td>
                            <span class="badge {{ $statusClass }} px-3 py-2 rounded-pill">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('purchase-items.show', $item) }}" class="btn btn-info btn-sm shadow-sm">View</a>
                                <a href="{{ route('purchase-items.edit', $item) }}" class="btn btn-warning btn-sm shadow-sm">Edit</a>
                                <form action="{{ route('purchase-items.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center fw-semibold">No purchase items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
