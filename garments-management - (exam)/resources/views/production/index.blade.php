@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <h2 class="mb-2 mb-md-0">Productions</h2>
    
    <div class="btn-group">
        <a href="{{ route('productions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Production Entry
        </a>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="bi bi-printer me-1"></i> Print
        </button>
    </div>
</div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle text-center table-striped">
                <thead class="table-dark bg-black">
                    <tr>
                        <th>#</th>
                        <th>Order No</th>
                        <th>Production Date</th>
                        <th>Line</th>
                        <th>Planned Qty</th>
                        <th>Produced Qty</th>
                        <th>Defect Qty</th>
                        <!-- <th>Status</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productions as $production)
                        <tr>
                            <td>{{ $loop->iteration + ($productions->currentPage()-1)*$productions->perPage() }}</td>
                            <td>{{ $production->order_no }}</td>
                            <td>{{ $production->production_date->format('d M, Y') }}</td>
                            <td>{{ $production->line->name ?? '-' }}</td>
                            <td>{{ $production->planned_qty }}</td>
                            <td>{{ $production->produced_qty }}</td>
                            <td>{{ $production->defect_qty }}</td>
                            <!-- <td>
                                @if($production->is_completed)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td> -->
                            <td>
                                <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('productions.destroy', $production->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this production?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No productions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $productions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
