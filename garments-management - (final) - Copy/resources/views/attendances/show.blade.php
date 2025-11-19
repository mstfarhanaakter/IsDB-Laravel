@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Attendance Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Employee:</strong> {{ $attendance->employee->first_name ?? 'N/A' }} {{ $attendance->employee->last_name ?? '' }}</p>
            <p><strong>Date:</strong> {{ $attendance->date }}</p>
            <p><strong>Status:</strong> {{ $attendance->status }}</p>

            <a href="{{ route('attendances.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
