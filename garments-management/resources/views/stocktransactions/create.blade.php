@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add Stock Transaction</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('stocktransactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Material</label>
            <select name="material_id" class="form-control">
                <option value="">Select Material</option>
                @foreach($materials as $m)
                    <option value="{{ $m->id }}" {{ old('material_id') == $m->id ? 'selected' : '' }}>
                        {{ $m->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="IN" {{ old('type') == 'IN' ? 'selected' : '' }}>IN</option>
                <option value="OUT" {{ old('type') == 'OUT' ? 'selected' : '' }}>OUT</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" step="0.01" name="quantity" class="form-control" value="{{ old('quantity', 0) }}">
        </div>

        <div class="mb-3">
            <label>Transaction Date</label>
            <input type="date" name="transaction_date" class="form-control" value="{{ old('transaction_date') }}">
        </div>

        <div class="mb-3">
            <label>Reference</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('stocktransactions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
