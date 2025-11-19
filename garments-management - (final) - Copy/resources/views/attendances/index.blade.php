@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Attendance List</h3>
                <a href="{{ route('attendances.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Attendance
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->id }}</td>
                                <td class="fw-semibold">
                                    {{ $attendance->employee->first_name ?? 'N/A' }} 
                                    {{ $attendance->employee->last_name ?? '' }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</td>
                                <td>
                                    @if($attendance->status == 'Present')
                                        <span class="badge bg-success">Present</span>
                                    @elseif($attendance->status == 'Absent')
                                        <span class="badge bg-danger">Absent</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $attendance->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('attendances.show', $attendance->id) }}" 
                                       class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" 
                                       class="btn btn-sm btn-outline-warning">Edit</a>

                                    <form action="{{ route('attendances.destroy', $attendance->id) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this attendance?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No attendance records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
