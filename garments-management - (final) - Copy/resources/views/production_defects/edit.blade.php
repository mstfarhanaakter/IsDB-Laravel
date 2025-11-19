@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Edit Production Defect</h1>
        <a href="{{ route('production_defects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('production_defects.update', $productionDefect->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Production Line</label>
                        <select name="productions_line_id" class="form-select" required>
                            @foreach($productionLines as $line)
                                <option value="{{ $line->id }}" {{ $productionDefect->productions_line_id == $line->id ? 'selected' : '' }}>
                                    {{ $line->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Order</label>
                        <select name="order_id" class="form-select" required>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" {{ $productionDefect->order_id == $order->id ? 'selected' : '' }}>
                                    {{ $order->order_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Defect Type</label>
                        <input type="text" name="defect_type" class="form-control" value="{{ $productionDefect->defect_type }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Defect Quantity</label>
                        <input type="number" name="defect_qty" class="form-control" value="{{ $productionDefect->defect_qty }}" min="0" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Reported By</label>
                        <input type="text" name="reported_by" class="form-control" value="{{ $productionDefect->reported_by }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="pending" {{ $productionDefect->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reworked" {{ $productionDefect->status == 'reworked' ? 'selected' : '' }}>Reworked</option>
                            <option value="scrapped" {{ $productionDefect->status == 'scrapped' ? 'selected' : '' }}>Scrapped</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $productionDefect->description }}</textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label>Image</label>
                        @if($productionDefect->image_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$productionDefect->image_path) }}" class="img-thumbnail" width="120">
                            </div>
                        @endif
                        <input type="file" name="image_path" cla_
