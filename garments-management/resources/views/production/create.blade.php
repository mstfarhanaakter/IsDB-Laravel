@extends('layout.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>New Production Entry</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('productions.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="production_date" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Production Line</label>
        <select name="line" class="form-control" required>
          <option value="">-- Select Line --</option>
          <option value="Line 1">Line 1</option>
          <option value="Line 2">Line 2</option>
          <option value="Line 3">Line 3</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Order No</label>
        <input type="text" name="order_no" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Produced Quantity</label>
        <input type="number" name="produced_qty" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Defect Quantity</label>
        <input type="number" name="defect_qty" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Remarks</label>
        <textarea name="remarks" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection
