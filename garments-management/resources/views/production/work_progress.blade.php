@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Work Progress Dashboard</h2>

    <div class="d-flex justify-content-end mb-3">
    <button onclick="window.print()" class="btn btn-secondary btn-primary">
        <i class="bi bi-printer"></i> Print
    </button>
</div>


     

    <div class="table-responsive text-center">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Line Name</th>
                    <th>Planned Qty</th>
                    <th>Produced Qty</th>
                    <th>Defect Qty</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progressData as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data['line_name'] }}</td>
                    <td>{{ $data['planned'] }}</td>
                    <td>{{ $data['produced'] }}</td>
                    <td>{{ $data['defect'] }}</td>
                    <td style="min-width:200px;">
                        <div class="progress" style="height:20px;">
                            <div class="progress-bar @if($data['progress'] < 50) bg-danger @elseif($data['progress'] < 100) bg-warning @else bg-success @endif" role="progressbar" style="width: {{ $data['progress'] }}%;" aria-valuenow="{{ $data['progress'] }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $data['progress'] }}%
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
