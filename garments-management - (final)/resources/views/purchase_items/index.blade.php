@extends('layouts.app')

@section('title', 'Purchase Items')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Purchase Items</h2>
        <a href="{{ route('purchase-items.create') }}" class="btn btn-primary">+ Add Purchase Item</a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <!-- <th>Purchase</th> -->
                        <th>Material</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($purchaseItems as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- <td>{{ $item->purchase->id ?? '—' }}</td> -->
                            <td>{{ $item->material->name ?? '—' }}</td>
                            <td>{{ $item->supplier->name ?? '—' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td> ৳{{ number_format($item->unit_price, 2) }}</td>
                            <td> ৳{{ number_format($item->quantity * $item->unit_price, 2) }}</td>
                            <td>
                                <a href="{{ route('purchase-items.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('purchase-items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('purchase-items.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No purchase items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
