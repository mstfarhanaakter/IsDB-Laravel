@extends('layout.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Production List</h5>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('productions.create') }}" class="btn btn-primary mb-3">Add Production Line</a>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Date</th>
          <th>Line</th>
          <th>Order No</th>
          <th>Produced Qty</th>
          <th>Defect Qty</th>
          <th>Remarks</th>
        </tr>
      </thead>
      <tbody>
        @foreach($productions as $prod)
        <tr>
          <td>{{ $prod->production_date }}</td>
          <td>{{ $prod->line }}</td>
          <td>{{ $prod->order_no }}</td>
          <td>{{ $prod->produced_qty }}</td>
          <td>{{ $prod->defect_qty }}</td>
          <td>{{ $prod->remarks }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
