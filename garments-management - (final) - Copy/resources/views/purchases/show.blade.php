@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Purchase Details #{{ $purchase->id }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $purchase->id }}</p>
            <p><strong>Supplier:</strong> {{ $purchase->supplier ? $purchase->supplier->name : 'N/A' }}</p>
            <p><strong>Material:</strong> {{ $purchase->material ? $purchase->material->name : 'N/A' }}</p>
            <p><strong>Purchase Date:</strong> {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</p>
            <p><strong>Total Amount:</strong> {{ number_format($purchase->total_amount, 2) }}</p>
            <p><strong>Created At:</strong> {{ $purchase->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $purchase->updated_at->format('d M Y, H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Back to List</a>

            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this purchase?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
