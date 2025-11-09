@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Purchases</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('purchases.create') }}" class="btn btn-primary mb-3">Add New Purchase</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier</th>
                <th>Material</th>
                <th>Purchase Date</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->supplier ? $purchase->supplier->name : 'No Supplier' }}</td>
                    <td>{{ $purchase->material ? $purchase->material->name : 'No Material' }}</td>
                    <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</td>
                    <td>{{ number_format($purchase->total_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this purchase?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No purchases found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
