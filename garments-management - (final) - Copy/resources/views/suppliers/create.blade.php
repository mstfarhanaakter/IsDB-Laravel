@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Supplier</h1>

    {{-- Display validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
