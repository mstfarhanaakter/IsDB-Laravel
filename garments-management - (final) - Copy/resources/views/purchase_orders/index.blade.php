@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Purchase Orders & Items</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-bordered text-center align-middle mb-0">
            <thead class="table-dark text-uppercase">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Items</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="align-middle">
                        <td class="fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $order->supplier->name }}</td>
                        <td class="p-0">
                            {{-- Inner table for items --}}
                            <table class="table table-borderless mb-0 table-sm">
                                <thead>
                                    <tr class="table-secondary text-center">
                                        <th>Material</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        @php
                                            $itemStatusClass = match($item->status) {
                                                'pending' => 'bg-warning text-dark',
                                                'approved' => 'bg-success text-white',
                                                'rejected' => 'bg-danger text-white',
                                                default => 'bg-secondary text-white'
                                            };
                                        @endphp
                                        <tr class="text-center align-middle">
                                            <td class="fw-semibold">{{ $item->material->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <span class="badge {{ $itemStatusClass }} px-3 py-2 rounded-pill">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('purchase-items.edit', $item->id) }}" 
                                                   class="btn btn-sm btn-primary shadow-sm">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
