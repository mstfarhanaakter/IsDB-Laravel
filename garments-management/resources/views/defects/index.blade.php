@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Defect List</h4>
        <a href="{{ route('defects.create') }}" class="btn btn-primary">+ Add New Defect</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Order No</th>
                    <th>Production Line</th>
                    <th>Defect Type</th>
                    <th>Defect Qty</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($defects as $defect)
                    <tr>
                     <td>{{ $loop->iteration }}</td>
                        <td>{{ $defect->production->order_no ?? '-' }}</td>
                        <td>{{ $defect->production->line->name ?? '-' }}</td>
                        <td>{{ $defect->defect_type }}</td>
                        <td>{{ $defect->defect_qty }}</td>
                        <td>
                            @if($defect->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($defect->status == 'reworked')
                                <span class="badge bg-info text-dark">Reworked</span>
                            @elseif($defect->status == 'scrapped')
                                <span class="badge bg-danger">Scrapped</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('defects.edit', $defect->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('defects.destroy', $defect->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this defect?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No defects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
