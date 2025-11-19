@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-4 fw-bold">Create New Order</h3>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- Left Column -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="buyer_id" class="form-label">Buyer <span class="text-danger">*</span></label>
                            <select name="buyer_id" id="buyer_id" class="form-select" required>
                                <option value="">-- Select Buyer --</option>
                                @foreach($buyers as $buyer)
                                    <option value="{{ $buyer->id }}" {{ old('buyer_id') == $buyer->id ? 'selected' : '' }}>
                                        {{ $buyer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('buyer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order_number" class="form-label">Order Number <span class="text-danger">*</span></label>
                            <input type="text" name="order_number" id="order_number" class="form-control" value="{{ old('order_number') }}" placeholder="Enter order number" required>
                            @error('order_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order_date" class="form-label">Order Date <span class="text-danger">*</span></label>
                            <input type="date" name="order_date" id="order_date" class="form-control" value="{{ old('order_date', date('Y-m-d')) }}" required>
                            @error('order_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="delivery_date" class="form-label">Delivery Date</label>
                            <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="{{ old('delivery_date') }}">
                            @error('delivery_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_qty" class="form-label">Total Quantity</label>
                            <input type="number" name="total_qty" id="total_qty" class="form-control" value="{{ old('total_qty', 0) }}" placeholder="Enter total quantity">
                            @error('total_qty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="">-- Select Status --</option>
                                @foreach(['pending','in_production','completed','delivered'] as $status)
                                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_',' ', $status)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save Order
                    </button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
