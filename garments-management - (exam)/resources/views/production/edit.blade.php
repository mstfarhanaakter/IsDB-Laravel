@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Production</h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('productions.update', $production->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Order No <span class="text-danger">*</span></label>
                            <input type="text" name="order_no" class="form-control" value="{{ old('order_no', $production->order_no) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Production Date <span class="text-danger">*</span></label>
                            <input type="date" name="production_date" class="form-control" value="{{ old('production_date', $production->production_date->format('Y-m-d')) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Planned Quantity</label>
                            <input type="number" name="planned_qty" class="form-control" value="{{ old('planned_qty', $production->planned_qty) }}" min="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Production Line <span class="text-danger">*</span></label>
                            <select name="line_id" class="form-select" required>
                                <option value="">Select Line</option>
                                @foreach($lines as $line)
                                    <option value="{{ $line->id }}" {{ old('line_id', $production->line_id) == $line->id ? 'selected' : '' }}>
                                        {{ $line->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Produced Quantity</label>
                            <input type="number" name="produced_qty" class="form-control" value="{{ old('produced_qty', $production->produced_qty) }}" min="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Defect Quantity</label>
                            <input type="number" name="defect_qty" class="form-control" value="{{ old('defect_qty', $production->defect_qty) }}" min="0">
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="is_completed" class="form-select" required>
                                <option value="0" {{ old('is_completed', $production->is_completed) == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ old('is_completed', $production->is_completed) == 1 ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2">{{ old('remarks', $production->remarks) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('productions.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i> Update Production
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
