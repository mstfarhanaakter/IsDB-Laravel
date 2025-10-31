@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Production List</h5>
            <a href="{{ route('productions.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add Production
            </a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Date</th>
                            <th>Line</th>
                            <th>Order No</th>
                            <th>Produced Qty</th>
                            <th>Defect Qty</th>
                            <th>Remarks</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productions as $prod)
                        <tr class="text-center">
                            <td>{{ \Carbon\Carbon::parse($prod->production_date)->format('d M Y') }}</td>
                            <td>{{ $prod->line }}</td>
                            <td>{{ $prod->order_no }}</td>
                            <td>{{ number_format($prod->produced_qty, 2) }}</td>
                            <td>{{ number_format($prod->defect_qty, 2) }}</td>
                            <td>{{ $prod->remarks ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('productions.edit', $prod) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('productions.destroy', $prod) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this production entry?')" 
                                        title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No production records found. <a href="{{ route('productions.create') }}">Add a new production</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
