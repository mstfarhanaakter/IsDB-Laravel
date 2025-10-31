@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Stock Transactions</h2>
        <a href="{{ route('stocktransactions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Transaction
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table id="transactions-table" class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Material</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Reference</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $t)
                <tr class="text-center">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $t->material->name }}</td>
                    <td>
                        @if(strtolower($t->type) === 'in')
                            <span class="badge bg-success">{{ $t->type }}</span>
                        @else
                            <span class="badge bg-danger">{{ $t->type }}</span>
                        @endif
                    </td>
                    <td>{{ number_format($t->quantity, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->transaction_date)->format('d M Y') }}</td>
                    <td>{{ $t->reference ?? 'N/A' }}</td>
                    <td class="text-center">
                        <a href="{{ route('stocktransactions.edit', $t) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('stocktransactions.destroy', $t) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this transaction?')" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No stock transactions found. <a href="{{ route('stocktransactions.create') }}">Add a new transaction</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables Initialization -->
<script>
$(document).ready(function() {
    $('#transactions-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<i class="bi bi-printer"></i> Print',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="bi bi-file-earmark-text"></i> CSV',
                className: 'btn btn-info btn-sm'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                className: 'btn btn-danger btn-sm'
            }
        ]
    });
});
</script>
@endsection
