@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Production Line Details</h1>
    <a href="{{ route('production-lines.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $productionLine->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $productionLine->description }}</p>
        </div>
    </div>
</div>
@endsection
