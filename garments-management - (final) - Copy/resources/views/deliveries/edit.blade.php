@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit Delivery</h4>
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

            <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Order <span class="text-danger">*</span></label>
                    <select name="order_id" class="form-select" required>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}" {{ $delivery->order_id == $order->id ? 'selected' : '' }}>
                                {{ $order->order_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Date <span class="text-danger">*</span></label>
                    <input type="date" name="delivery_date" class="form-control" value="{{ $delivery->delivery_date->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ $delivery->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="on_the_way" {{ $delivery->status == 'on_the_way' ? 'selected' : '' }}>On the Way</option>
                        <option value="delivered" {{ $delivery->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Delivery</button>
                <a href="{{ route('deliveries.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>
    </div>
</div>

@endsection
