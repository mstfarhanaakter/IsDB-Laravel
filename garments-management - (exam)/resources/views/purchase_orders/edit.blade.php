@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Purchase Order</h1>

    <form action="{{ route('purchase_orders.update', $purchase_order->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Supplier --}}
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $purchase_order->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Supply --}}
        <div class="mb-3">
            <label for="supply_id" class="form-label">Supply</label>
            <select name="supply_id" id="supply_id" class="form-select">
                @foreach($supplies as $supply)
                    <option value="{{ $supply->id }}" {{ $purchase_order->supply_id == $supply->id ? 'selected' : '' }}>
                        {{ $supply->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Quantity --}}
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $purchase_order->quantity }}" required>
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $purchase_order->price }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="Pending" {{ $purchase_order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $purchase_order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $purchase_order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        {{-- Order Date --}}
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input 
                type="date" 
                name="order_date" 
                id="order_date" 
                class="form-control" 
                value="{{ \Carbon\Carbon::parse($purchase_order->order_date)->format('Y-m-d') }}"
                required
            >
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update Purchase Order</button>
    </form>
</div>
@endsection
