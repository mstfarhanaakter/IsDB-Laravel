@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Work Progress by Production Line & Orders</h1>
        <a href="{{ route('productions.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Productions
        </a>
    </div>

    @forelse ($progressData as $line)
        <div class="card mb-6 shadow-sm">
            <div class="card-header bg-info text-white p-3">
                <h5 class="mb-0 text-center font-bold fs-4">{{ $line['line_name'] }}</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Order No</th>
                                <th>Planned Qty</th>
                                <th>Produced Qty</th>
                                <th>Defect Qty</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($line['orders'] as $order)
                                <tr class="text-center">
                                    <td>
                                        <strong>{{ $order['order_no'] }}</strong>
                                    </td>
                                    <td>{{ $order['planned'] ?? 0 }}</td>
                                    <td>{{ $order['produced'] ?? 0 }}</td>
                                    <td>{{ $order['defect'] ?? 0 }}</td>
                                    <td style="width: 250px;">
                                        <div class="progress" style="height: 24px;">
                                            <div class="progress-bar
                                                @if($order['progress'] >= 100) bg-success
                                                @elseif($order['progress'] >= 50) bg-warning text-dark
                                                @else bg-danger @endif"
                                                role="progressbar"
                                                style="width: {{ $order['progress'] }}%;"
                                                aria-valuenow="{{ $order['progress'] }}"
                                                aria-valuemin="0"
                                                aria-valuemax="100">
                                                <span class="fw-bold">{{ $order['progress'] }}%</span>
                                            </div>
                                        </div>
                                        <small class="text-muted">
                                            {{ $order['produced'] ?? 0 }}/{{ $order['planned'] ?? 0 }} completed
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No orders found for this line.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">No production lines found.</p>
    @endforelse
</div>
@endsection
