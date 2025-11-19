@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Report Production Defect</h1>
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
            <form action="{{ route('production_defects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Production Line</label>
                        <select name="productions_line_id" class="form-select" required>
                            <option value="">Select Line</option>
                            @foreach($productionLines as $line)
                                <option value="{{ $line->id }}">{{ $line->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Order</label>
                        <select name="order_id" class="form-select" required>
                            <option value="">Select Order</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Defect Type</label>
                        <input type="text" name="defect_type" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Defect Quantity</label>
                        <input type="number" name="defect_qty" class="form-control" min="0" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Reported By</label>
                        <input type="text" name="reported_by" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="pending">Pending</option>
                            <option value="reworked">Reworked</option>
                            <option value="scrapped">Scrapped</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label>Image</label>
                        <input type="file" name="image_path" class="form-control" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
