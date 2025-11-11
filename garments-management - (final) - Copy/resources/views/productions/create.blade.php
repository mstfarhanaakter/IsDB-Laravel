@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Production</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Order</label>
            <select name="order_id" id="order_id" class="form-select">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="line_id" class="form-label">Production Line</label>
            <select name="line_id" id="line_id" class="form-select">
                @foreach($lines as $line)
                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="production_date" class="form-label">Production Date</label>
            <input type="date" name="production_date" id="production_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="planned_qty" class="form-label">Planned Quantity</label>
            <input type="number" name="planned_qty" id="planned_qty" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="produced_qty" class="form-label">Produced Quantity</label>
            <input type="number" name="produced_qty" id="produced_qty" class="form-control">
        </div>

        <div class="mb-3">
            <label for="defect_qty" class="form-label">Defect Quantity</label>
            <input type="number" name="defect_qty" id="defect_qty" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Production</button>
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
