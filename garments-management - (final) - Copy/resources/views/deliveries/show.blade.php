@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Delivery Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Order No:</strong> {{ $delivery->order->order_number }}</p>
            <p><strong>Delivery Date:</strong> {{ $delivery->delivery_date->format('d M, Y') }}</p>
            <p><strong>Status:</strong> 
                @switch($delivery->status)
                    @case('pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                        @break
                    @case('on_the_way')
                        <span class="badge bg-info text-dark">On the Way</span>
                        @break
                    @case('delivered')
                        <span class="badge bg-success">Delivered</span>
                        @break
                    @default
                        <span class="badge bg-light text-dark">Unknown</span>
                @endswitch
            </p>
            <a href="{{ route('deliveries.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>

@endsection
