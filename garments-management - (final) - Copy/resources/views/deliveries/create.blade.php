@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Add Delivery</h4>
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

            <form action="{{ route('deliveries.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Order <span class="text-danger">*</span></label>
                    <select name="order_id" class="form-select" required>
                        <option value="">Select Order</option>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Date <span class="text-danger">*</span></label>
                    <input type="date" name="delivery_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="on_the_way">On the Way</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Delivery</button>
                <a href="{{ route('deliveries.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>
    </div>
</div>

@endsection
