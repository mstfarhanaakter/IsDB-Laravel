@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Production Line</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('production_lines.update', $production_line->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Line Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $production_line->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $production_line->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('production_lines.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
