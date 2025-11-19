@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Generate Salary Sheet</h2>

    <form action="{{ route('salaries.generate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Month</label>
            <select name="month" class="form-select" required>
                @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $m)
                    <option value="{{ $m }}">{{ $m }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ date('Y') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Generate Salary</button>
    </form>
</div>
@endsection
