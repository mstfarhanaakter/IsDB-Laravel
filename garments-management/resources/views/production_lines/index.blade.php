@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Production Lines</h2>
        <div>
            <a href="{{ route('production_lines.create') }}" class="btn btn-primary me-2">
                <i class="bi bi-plus-circle"></i> Create Line
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
                    <th>Name</th>
                    <th>Description</th>
                    <th style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lines as $line)
                <tr class="text-center">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $line->name }}</td>
                    <td>{{ $line->description ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('production_lines.edit', $line->id) }}" class="btn btn-success btn-sm me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('production_lines.destroy', $line->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this line?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No production lines found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $lines->links() }}
    </div>
</div>
@endsection
