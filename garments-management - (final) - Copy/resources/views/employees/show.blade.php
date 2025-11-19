@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Employee Details</h2>

    <div class="card">
        <div class="card-body">

            <h4>{{ $employee->first_name }} {{ $employee->last_name }}</h4>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone ?? 'N/A' }}</p>
            <p><strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</p>
            <p><strong>Position:</strong> {{ $employee->position ?? 'N/A' }}</p>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to List</a>

        </div>
    </div>
</div>
@endsection
