@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Salary — {{ $salary->employee->full_name }}</h2>

    <form action="{{ route('salaries.update',$salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Basic</label>
            <input type="number" name="basic" class="form-control" value="{{ $salary->basic }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>House Rent</label>
            <input type="number" name="house_rent" class="form-control" value="{{ $salary->house_rent }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Medical</label>
            <input type="number" name="medical" class="form-control" value="{{ $salary->medical }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Transport</label>
            <input type="number" name="transport" class="form-control" value="{{ $salary->transport }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Overtime</label>
            <input type="number" name="overtime_amount" class="form-control" value="{{ $salary->overtime_amount }}" step="0.01">
        </div>

        <div class="mb-3">
            <label>Absent Deduction</label>
            <input type="number" name="absent_deduction" class="form-control" value="{{ $salary->absent_deduction }}" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Update Salary</button>
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
