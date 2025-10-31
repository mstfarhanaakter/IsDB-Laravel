@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Productions</h2>
        <div>
            <a href="{{ route('productions.create') }}" class="btn btn-primary me-2">
                <i class="bi bi-plus-circle"></i> Create Production
            </a>
            <button onclick="window.print()" class="btn btn-secondary">
                <i class="bi bi-printer"></i> Print
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Order No</th>
                    <th>Production Date</th>
                    <th>Produced Qty</th>
                    <th>Defect Qty</th>
                    <th>Line</th>
                    <th>Status</th>
                    <th style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productions as $production)
                <tr class="text-center">
                    <td >{{ $loop->iteration }}</td>
                    <td>{{ $production->order_no }}</td>
                    <td>{{ \Carbon\Carbon::parse($production->production_date)->format('d-m-Y') }}</td>
                    <td>{{ $production->produced_qty }}</td>
                    <td>{{ $production->defect_qty }}</td>
                    <td>{{ $production->line->name ?? '-' }}</td>
                    <td>
                        @if($production->is_completed)
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning btn-sm me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('productions.destroy', $production->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this production?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No productions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $productions->links() }}
    </div>
</div>
@endsection
