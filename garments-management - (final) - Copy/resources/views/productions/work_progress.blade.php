@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Work Progress by Production Line</h1>
    <a href="{{ route('productions.index') }}" class="btn btn-secondary mb-3">Back to Productions</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Production Line</th>
                <th>Planned Qty</th>
                <th>Produced Qty</th>
                <th>Defect Qty</th>
                <th>Progress (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($progressData as $line)
                <tr>
                    <td>{{ $line['line_name'] }}</td>
                    <td>{{ $line['planned'] }}</td>
                    <td>{{ $line['produced'] }}</td>
                    <td>{{ $line['defect'] }}</td>
                    <td>{{ $line['progress'] }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
