@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Edit Production #{{ $production->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productions.update', $production->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="order_id" class="form-label">Order</label>
                <select name="order_id" id="order_id" class="form-select" required>
                    <option value="">-- Select Order --</option>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}" {{ $production->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->order_no }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="department_id" class="form-label">Department</label>
                <select name="department_id" id="department_id" class="form-select" required>
                    <option value="">-- Select Department --</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $production->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $production->start_date }}" required>
            </div>

            <div class="col-md-6">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $production->end_date }}">
            </div>

            <div class="col-md-6">
                <label for="completed_qty" class="form-label">Produced Quantity</label>
                <input type="number" name="completed_qty" id="completed_qty" class="form-control" value="{{ $production->completed_qty }}" min="0" required>
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="not_started" {{ $production->status == 'not_started' ? 'selected' : '' }}>Not Started</option>
                    <option value="ongoing" {{ $production->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ $production->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Production</button>
            <a href="{{ route('productions.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
