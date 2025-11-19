@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Production Details</h2>
    <a href="{{ route('productions.index') }}" class="btn btn-secondary mb-3">Back to Productions</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $production->id }}</td>
        </tr>
        <tr>
            <th>Order No</th>
            <td>{{ $production->order->order_no }}</td>
        </tr>
        <tr>
            <th>Production Line</th>
            <td>{{ $production->line->name }}</td>
        </tr>
        <tr>
            <th>Production Date</th>
            <td>{{ $production->production_date->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Planned Quantity</th>
            <td>{{ $production->planned_qty }}</td>
        </tr>
        <tr>
            <th>Produced Quantity</th>
            <td>{{ $production->produced_qty }}</td>
        </tr>
        <tr>
            <th>Defective Quantity</th>
            <td>{{ $production->defect_qty }}</td>
        </tr>
        <tr>
            <th>Remarks</th>
            <td>{{ $production->remarks }}</td>
        </tr>
        <tr>
            <th>Completed</th>
            <td>{{ $production->is_completed ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
</div>
@endsection
