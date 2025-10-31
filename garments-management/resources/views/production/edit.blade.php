@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Production</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productions.update', $production->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="order_no" class="form-label">Order No <span class="text-danger">*</span></label>
                <input type="text" name="order_no" id="order_no" class="form-control" value="{{ old('order_no', $production->order_no) }}" required>
            </div>

            <div class="col-md-6">
                <label for="production_date" class="form-label">Production Date <span class="text-danger">*</span></label>
                <input type="date" name="production_date" id="production_date" class="form-control" value="{{ old('production_date', $production->production_date) }}" required>
            </div>

            <div class="col-md-6">
                <label for="produced_qty" class="form-label">Produced Quantity</label>
                <input type="number" name="produced_qty" id="produced_qty" class="form-control" value="{{ old('produced_qty', $production->produced_qty) }}">
            </div>

            <div class="col-md-6">
                <label for="defect_qty" class="form-label">Defect Quantity</label>
                <input type="number" name="defect_qty" id="defect_qty" class="form-control" value="{{ old('defect_qty', $production->defect_qty) }}">
            </div>

            <div class="col-md-6">
                <label for="line_id" class="form-label">Production Line <span class="text-danger">*</span></label>
                <select name="line_id" id="line_id" class="form-control" required>
                    <option value="">Select Line</option>
                    @foreach($lines as $line)
                        <option value="{{ $line->id }}" {{ old('line_id', $production->line_id) == $line->id ? 'selected' : '' }}>
                            {{ $line->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="is_completed" id="status" class="form-control" required>
                    <option value="0" {{ old('is_completed', $production->is_completed) == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ old('is_completed', $production->is_completed) == 1 ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks', $production->remarks) }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success me-2">
                <i class="bi bi-check-circle"></i> Update Production
            </button>
            <a href="{{ route('productions.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
