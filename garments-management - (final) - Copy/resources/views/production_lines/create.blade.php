@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Production Line</h1>
    <a href="{{ route('production-lines.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('production-lines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Line Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
