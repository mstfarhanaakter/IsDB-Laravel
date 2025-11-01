@extends('layout.app')

@section('content')
<div class="container mt-4">
    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Employee Attendance</h2>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Attendance
        </a>
    </div>

    {{-- Attendance Table --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    @php
                        $status = strtolower(trim($attendance->status));
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $attendance->employee->name }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</td>
                        <td class="text-center">{{ $attendance->check_in ?? '-' }}</td>
                        <td class="text-center">{{ $attendance->check_out ?? '-' }}</td>
                        <td class="text-center">
                            @switch($status)
                                @case('present')
                                    <span class="badge bg-success">Present</span>
                                    @break
                                @case('absent')
                                    <span class="badge bg-danger">Absent</span>
                                    @break
                                @case('late')
                                    <span class="badge bg-warning text-dark">Late</span>
                                    @break
                                @case('on leave')
                                    <span class="badge bg-info text-dark">On Leave</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ $attendance->status }}</span>
                            @endswitch
                        </td>
                        <td>{{ $attendance->remarks ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No attendance records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
