@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Purchase Order #{{ $purchaseOrder->id }}</h1>

    <form action="{{ route('purchase-orders.update', $purchaseOrder) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach(\App\Models\Supplier::all() as $supplier)
                    <option value="{{ $supplier->id }}" {{ $purchaseOrder->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control" value="{{ $purchaseOrder->order_date }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $purchaseOrder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $purchaseOrder->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="delivered" {{ $purchaseOrder->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $purchaseOrder->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('purchase-orders.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
