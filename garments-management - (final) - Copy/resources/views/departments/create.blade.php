@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add New Department</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Department</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
