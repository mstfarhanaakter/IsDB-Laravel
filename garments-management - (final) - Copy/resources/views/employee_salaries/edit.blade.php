@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee Salary</h2>

    <form action="{{ route('employee-salaries.update', $employeeSalary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employeeSalary->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2">
            <label>Month</label>
            <select name="month" class="form-control" required>
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}" {{ $employeeSalary->month == $i ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::createFromDate(null, $i, 1)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="form-group mb-2">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ $employeeSalary->year }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Basic</label>
            <input type="number" step="0.01" name="basic" class="form-control" value="{{ $employeeSalary->basic }}" required>
        </div>

        <div class="form-group mb-2">
            <label>House Rent</label>
            <input type="number" step="0.01" name="house_rent" class="form-control" value="{{ $employeeSalary->house_rent }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Medical</label>
            <input type="number" step="0.01" name="medical" class="form-control" value="{{ $employeeSalary->medical }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Transport</label>
            <input type="number" step="0.01" name="transport" class="form-control" value="{{ $employeeSalary->transport }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Overtime Amount</label>
            <input type="number" step="0.01" name="overtime_amount" class="form-control" value="{{ $employeeSalary->overtime_amount }}">
        </div>

        <div class="form-group mb-2">
            <label>Absent Deduction</label>
            <input type="number" step="0.01" name="absent_deduction" class="form-control" value="{{ $employeeSalary->absent_deduction }}">
        </div>

        <div class="form-group mb-2">
            <label>Gross Salary</label>
            <input type="number" step="0.01" name="gross_salary" class="form-control" value="{{ $employeeSalary->gross_salary }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Net Salary</label>
            <input type="number" step="0.01" name="net_salary" class="form-control" value="{{ $employeeSalary->net_salary }}" required>
        </div>

        <button class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection
