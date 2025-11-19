@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Production Defects</h1>
        <a href="{{ route('production_defects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Report Defect
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Production Line</th>
                        <th>Order No</th>
                        <th>Defect Type</th>
                        <th>Qty</th>
                        <th>Reported By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($defects as $defect)
                        <tr>
                            <td>{{ $defect->id }}</td>
                            <td>{{ $defect->productionLine->name ?? '-' }}</td>
                            <td>{{ $defect->order->order_number?? '-' }}</td>
                            <td>{{ $defect->defect_type }}</td>
                            <td>{{ $defect->defect_qty }}</td>
                            <td>{{ $defect->reported_by ?? '-' }}</td>
                            <td>
                                @if($defect->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($defect->status == 'reworked')
                                    <span class="badge bg-info text-dark">Reworked</span>
                                @else
                                    <span class="badge bg-danger">Scrapped</span>
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('production_defects.show', $defect->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('production_defects.edit', $defect->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('production_defects.destroy', $defect->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No defects reported yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $defects->links() }}
        </div>
    </div>
</div>
@endsection
