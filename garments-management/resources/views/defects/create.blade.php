@extends('layout.app')

@section('content')
<h2>Add Defect</h2>

{{-- Display Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('defects.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Production</label>
        <select name="production_id" class="form-control" required>
            <option value="">Select Production</option>
            @foreach($productions as $prod)
                <option value="{{ $prod->id }}" {{ old('production_id') == $prod->id ? 'selected' : '' }}>
                    {{ $prod->order_no }} ({{ $prod->line->name }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Defect Type</label>
        <input type="text" name="defect_type" class="form-control" value="{{ old('defect_type') }}" required>
    </div>

    <div class="mb-3">
        <label>Defect Qty</label>
        <input type="number" name="defect_qty" class="form-control" value="{{ old('defect_qty') }}" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="reworked" {{ old('status') == 'reworked' ? 'selected' : '' }}>Reworked</option>
            <option value="scrapped" {{ old('status') == 'scrapped' ? 'selected' : '' }}>Scrapped</option>
        </select>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('defects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
