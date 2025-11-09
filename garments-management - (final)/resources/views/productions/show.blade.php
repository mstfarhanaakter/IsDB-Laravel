@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Production Details #{{ $production->id }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Order</dt>
                <dd class="col-sm-9">{{ $production->order->order_no ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Department</dt>
                <dd class="col-sm-9">{{ $production->department->name ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Start Date</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($production->start_date)->format('Y-m-d') }}</dd>

                <dt class="col-sm-3">End Date</dt>
                <dd class="col-sm-9">{{ $production->end_date ? \Carbon\Carbon::parse($production->end_date)->format('Y-m-d') : '-' }}</dd>

                <dt class="col-sm-3">Produced Quantity</dt>
                <dd class="col-sm-9">{{ $production->completed_qty }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">
                    @switch($production->status)
                        @case('not_started')
                            <span class="badge bg-secondary">Not Started</span>
                            @break
                        @case('ongoing')
                            <span class="badge bg-warning text-dark">Ongoing</span>
                            @break
                        @case('completed')
                            <span class="badge bg-success">Completed</span>
                            @break
                    @endswitch
                </dd>
            </dl>
        </div>
    </div>

    <a href="{{ route('productions.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('productions.edit', $production->id) }}" class="btn btn-warning">Edit Production</a>
</div>
@endsection
