@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Production</h3>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productions.update', $production->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="order_id" class="form-label">Order</label>
                        <select name="order_id" id="order_id" class="form-select" required>
                            <option value="">Select Order</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" {{ $production->order_id == $order->id ? 'selected' : '' }}>
                                    {{ $order->order_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="line_id" class="form-label">Production Line</label>
                        <select name="line_id" id="line_id" class="form-select" required>
                            <option value="">Select Line</option>
                            @foreach($lines as $line)
                                <option value="{{ $line->id }}" {{ $production->line_id == $line->id ? 'selected' : '' }}>
                                    {{ $line->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="production_date" class="form-label">Production Date</label>
                        <input type="date" name="production_date" id="production_date" class="form-control" value="{{ $production->production_date }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="planned_qty" class="form-label">Planned Quantity</label>
                        <input type="number" name="planned_qty" id="planned_qty" class="form-control" value="{{ $production->planned_qty }}" min="0" placeholder="Enter planned quantity" required>
                    </div>

                    <div class="col-md-4">
                        <label for="produced_qty" class="form-label">Produced Quantity</label>
                        <input type="number" name="produced_qty" id="produced_qty" class="form-control" value="{{ $production->produced_qty }}" min="0" placeholder="Enter produced quantity">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="defect_qty" class="form-label">Defect Quantity</label>
                        <input type="number" name="defect_qty" id="defect_qty" class="form-control" value="{{ $production->defect_qty }}" min="0" placeholder="Enter defect quantity">
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check mt-4">
                            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" {{ $production->is_completed ? 'checked' : '' }}>
                            <label for="is_completed" class="form-check-label">Completed</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('productions.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">Update Production</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
