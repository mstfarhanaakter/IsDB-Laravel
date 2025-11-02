@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Defect</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('defects.update', $defect->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="production_id" class="form-label">Production</label>
            <select name="production_id" id="production_id" class="form-control" required>
                @foreach($productions as $production)
                    <option value="{{ $production->id }}" {{ $defect->production_id == $production->id ? 'selected' : '' }}>
                        {{ $production->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="defect_type" class="form-label">Defect Type</label>
            <input type="text" name="defect_type" id="defect_type" class="form-control" value="{{ $defect->defect_type }}" required>
        </div>

        <div class="mb-3">
            <label for="defect_qty" class="form-label">Quantity</label>
            <input type="number" name="defect_qty" id="defect_qty" class="form-control" min="1" value="{{ $defect->defect_qty }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $defect->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="reworked" {{ $defect->status == 'reworked' ? 'selected' : '' }}>Reworked</option>
                <option value="scrapped" {{ $defect->status == 'scrapped' ? 'selected' : '' }}>Scrapped</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('defects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
