@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4>Edit Order</h4>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Buyer <span class="text-danger">*</span></label>
                <select name="buyer_id" class="form-select" required>
                    <option value="">Select Buyer</option>
                    @foreach($buyers as $buyer)
                        <option value="{{ $buyer->id }}" {{ old('buyer_id', $order->buyer_id) == $buyer->id ? 'selected' : '' }}>
                            {{ $buyer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Order Number <span class="text-danger">*</span></label>
                <input type="text" name="order_no" class="form-control" value="{{ old('order_no', $order->order_no) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Order Date <span class="text-danger">*</span></label>
                <input type="date" name="order_date" class="form-control" value="{{ old('order_date', $order->order_date) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Delivery Date</label>
                <input type="date" name="delivery_date" class="form-control" value="{{ old('delivery_date', $order->delivery_date) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Total Quantity <span class="text-danger">*</span></label>
                <input type="number" name="total_qty" class="form-control" value="{{ old('total_qty', $order->total_qty) }}" min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                    <option value="">Select Status</option>
                    <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_production" {{ old('status', $order->status) == 'in_production' ? 'selected' : '' }}>In Production</option>
                    <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="delivered" {{ old('status', $order->status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
