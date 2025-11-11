@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Production Defect Details</h1>
    <a href="{{ route('production-defects.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Defect Type: {{ $productionDefect->defect_type }}</h5>
            <p><strong>Production:</strong> {{ $productionDefect->production->name ?? 'N/A' }}</p>
            <p><strong>Quantity:</strong> {{ $productionDefect->defect_qty }}</p>
            <p><strong>Reported By:</strong> {{ $productionDefect->reported_by }}</p>
            <p><strong>Status:</strong> {{ ucfirst($productionDefect->status) }}</p>
            <p><strong>Description:</strong> {{ $productionDefect->description }}</p>
            @if($productionDefect->image_path)
                <p><strong>Image:</strong><br>
                <img src="{{ asset('storage/' . $productionDefect->image_path) }}" alt="Defect Image" width="300"></p>
            @endif
        </div>
    </div>
</div>
@endsection
