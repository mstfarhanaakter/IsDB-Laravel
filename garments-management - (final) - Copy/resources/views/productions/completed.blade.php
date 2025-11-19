@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Completed Productions</h1>
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
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
                        <th>Planned Qty</th>
                        <th>Produced Qty</th>
                        <th>Defect Qty</th>
                        <th>Remarks</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productions as $production)
                        <tr>
                            <td>{{ $production->id }}</td>
                            <td>{{ $production->line->name ?? '-' }}</td>
                            <td>{{ $production->order->order_number ?? '-' }}</td>
                            <td>{{ $production->planned_qty }}</td>
                            <td>{{ $production->produced_qty ?? 0 }}</td>
                            <td>{{ $production->defect_qty ?? 0 }}</td>
                            <td>{{ $production->remarks ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">Completed</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No completed productions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $productions->links() }}
        </div>
    </div>
</div>
@endsection
