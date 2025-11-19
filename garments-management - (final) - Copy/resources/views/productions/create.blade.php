@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Production</h1>
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Productions
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('productions.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Order Selection -->
                    <div class="col-md-6">
                        <label for="order_id" class="form-label">Order</label>
                        <select name="order_id" id="order_id" class="form-select" required>
                            <option value="" selected disabled>Select Order</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" {{ old('order_id') == $order->id ? 'selected' : '' }}>
                                    {{ $order->order_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Production Line Selection -->
                    <div class="col-md-6">
                        <label for="line_id" class="form-label">Production Line</label>
                        <select name="line_id" id="line_id" class="form-select" required>
                            <option value="" selected disabled>Select Production Line</option>
                            @foreach($lines as $line)
                                <option value="{{ $line->id }}" {{ old('line_id') == $line->id ? 'selected' : '' }}>
                                    {{ $line->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Production Date -->
                    <div class="col-md-6">
                        <label for="production_date" class="form-label">Production Date</label>
                        <input type="date" name="production_date" id="production_date" class="form-control" value="{{ old('production_date') }}" required>
                    </div>

                    <!-- Planned Quantity -->
                    <div class="col-md-6">
                        <label for="planned_qty" class="form-label">Planned Quantity</label>
                        <input type="number" name="planned_qty" id="planned_qty" class="form-control" value="{{ old('planned_qty') }}" min="0" required>
                    </div>

                    <!-- Produced Quantity -->
                    <div class="col-md-6">
                        <label for="produced_qty" class="form-label">Produced Quantity</label>
                        <input type="number" name="produced_qty" id="produced_qty" class="form-control" value="{{ old('produced_qty', 0) }}" min="0">
                    </div>

                    <!-- Defect Quantity -->
                    <div class="col-md-6">
                        <label for="defect_qty" class="form-label">Defect Quantity</label>
                        <input type="number" name="defect_qty" id="defect_qty" class="form-control" value="{{ old('defect_qty', 0) }}" min="0">
                    </div>

                    <!-- Remarks -->
                    <div class="col-12">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ old('remarks') }}</textarea>
                    </div>

                    <!-- Completed Checkbox -->
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" value="1" {{ old('is_completed') ? 'checked' : '' }}>
                            <label for="is_completed" class="form-check-label">Mark as Completed</label>
                        </div>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Production
                    </button>
                    <a href="{{ route('productions.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
