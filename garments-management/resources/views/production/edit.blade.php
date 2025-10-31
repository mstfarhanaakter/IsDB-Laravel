@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Edit Production</h5>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('productions.update', $production->id) }}" method="POST">
      @csrf
      @method('POST')

      <div class="mb-3">
        <label for="production_date" class="form-label">Production Date</label>
        <input type="date" name="production_date" id="production_date" 
               class="form-control" value="{{ old('production_date', $production->production_date) }}" required>
      </div>

      <div class="mb-3">
        <label for="line" class="form-label">Line</label>
        <input type="text" name="line" id="line" 
               class="form-control" value="{{ old('line', $production->line) }}" required>
      </div>

      <div class="mb-3">
        <label for="order_no" class="form-label">Order No</label>
        <input type="text" name="order_no" id="order_no" 
               class="form-control" value="{{ old('order_no', $production->order_no) }}" required>
      </div>

      <div class="mb-3">
        <label for="produced_qty" class="form-label">Produced Quantity</label>
        <input type="number" name="produced_qty" id="produced_qty" 
               class="form-control" value="{{ old('produced_qty', $production->produced_qty) }}" required>
      </div>

      <div class="mb-3">
        <label for="defect_qty" class="form-label">Defect Quantity</label>
        <input type="number" name="defect_qty" id="defect_qty" 
               class="form-control" value="{{ old('defect_qty', $production->defect_qty) }}">
      </div>

      <div class="mb-3">
        <label for="remarks" class="form-label">Remarks</label>
        <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks', $production->remarks) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('productions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
