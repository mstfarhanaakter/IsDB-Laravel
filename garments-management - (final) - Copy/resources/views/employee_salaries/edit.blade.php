@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee Salary</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee-salaries.update', $employeeSalary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" class="form-control">
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employeeSalary->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Repeat input fields like create.blade.php but use $employeeSalary values -->

        <div class="mb-3">
            <label>Month</label>
            <input type="text" name="month" class="form-control" value="{{ $employeeSalary->month }}">
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ $employeeSalary->year }}">
        </div>

        <div class="mb-3">
            <label>Basic</label>
            <input type="number" step="0.01" name="basic" class="form-control" value="{{ $employeeSalary->basic }}">
        </div>

        <div class="mb-3">
            <label>House Rent</label>
            <input type="number" step="0.01" name="house_rent" class="form-control" value="{{ $employeeSalary->house_rent }}">
        </div>

        <div class="mb-3">
            <label>Medical</label>
            <input type="number" step="0.01" name="medical" class="form-control" value="{{ $employeeSalary->medical }}">
        </div>

        <div class="mb-3">
            <label>Transport</label>
            <input type="number" step="0.01" name="transport" class="form-control" value="{{ $employeeSalary->transport }}">
        </div>

        <div class="mb-3">
            <label>Overtime Amount</label>
            <input type="number" step="0.01" name="overtime_amount" class="form-control" value="{{ $employeeSalary->overtime_amount }}">
        </div>

        <div class="mb-3">
            <label>Absent Deduction</label>
            <input type="number" step="0.01" name="absent_deduction" class="form-control" value="{{ $employeeSalary->absent_deduction }}">
        </div>

        <div class="mb-3">
            <label>Gross Salary</label>
            <input type="number" step="0.01" name="gross_salary" class="form-control" value="{{ $employeeSalary->gross_salary }}">
        </div>

        <div class="mb-3">
            <label>Net Salary</label>
            <input type="number" step="0.01" name="net_salary" class="form-control" value="{{ $employeeSalary->net_salary }}">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('employee-salaries.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
