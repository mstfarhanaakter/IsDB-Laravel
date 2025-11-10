@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="buyer_id" class="form-label">Buyer</label>
            <select name="buyer_id" id="buyer_id" class="form-select" required>
                <option value="">-- Select Buyer --</option>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ old('buyer_id') == $buyer->id ? 'selected' : '' }}>
                        {{ $buyer->name }}
                    </option>
                @endforeach
            </select>
            @error('buyer_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="order_number" class="form-label">Order Number</label>
            <input type="text" name="order_number" class="form-control" value="{{ old('order_number') }}" required>
            @error('order_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" name="order_date" class="form-control" value="{{ old('order_date') }}" required>
            @error('order_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="delivery_date" class="form-label">Delivery Date</label>
            <input type="date" name="delivery_date" class="form-control" value="{{ old('delivery_date') }}">
            @error('delivery_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="total_qty" class="form-label">Total Quantity</label>
            <input type="number" name="total_qty" class="form-control" value="{{ old('total_qty', 0) }}">
            @error('total_qty') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="">-- Select Status --</option>
                @foreach(['pending','in_production','completed','delivered'] as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_',' ', $status)) }}
                    </option>
                @endforeach
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
