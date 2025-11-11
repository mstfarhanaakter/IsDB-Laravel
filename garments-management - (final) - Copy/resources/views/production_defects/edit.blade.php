@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Production Defect</h1>
    <a href="{{ route('production-defects.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('production-defects.update', $productionDefect->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="production_id" class="form-label">Production</label>
            <select name="production_id" class="form-select" required>
                @foreach($productions as $production)
                    <option value="{{ $production->id }}" {{ $productionDefect->production_id == $production->id ? 'selected' : '' }}>
                        {{ $production->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="defect_type" class="form-label">Defect Type</label>
            <input type="text" name="defect_type" class="form-control" value="{{ $productionDefect->defect_type }}" required>
        </div>
        <div class="mb-3">
            <label for="defect_qty" class="form-label">Quantity</label>
            <input type="number" name="defect_qty" class="form-control" value="{{ $productionDefect->defect_qty }}" required>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Reported By</label>
            <input type="text" name="reported_by" class="form-control" value="{{ $productionDefect->reported_by }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $productionDefect->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Image</label>
            <input type="file" name="image_path" class="form-control">
            @if($productionDefect->image_path)
                <img src="{{ asset('storage/' . $productionDefect->image_path) }}" alt="Defect Image" width="150" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $productionDefect->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="reworked" {{ $productionDefect->status == 'reworked' ? 'selected' : '' }}>Reworked</option>
                <option value="scrapped" {{ $productionDefect->status == 'scrapped' ? 'selected' : '' }}>Scrapped</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
