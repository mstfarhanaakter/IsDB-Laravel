@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Salary Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Employee</th>
            <td>{{ $employeeSalary->employee->first_name }} {{ $employeeSalary->employee->last_name }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ \Carbon\Carbon::createFromDate(null, $employeeSalary->month, 1)->format('F') }}</td>
        </tr>
        <tr>
            <th>Year</th>
            <td>{{ $employeeSalary->year }}</td>
        </tr>
        <tr>
            <th>Basic</th>
            <td>{{ number_format($employeeSalary->basic,2) }}</td>
        </tr>
        <tr>
            <th>House Rent</th>
            <td>{{ number_format($employeeSalary->house_rent,2) }}</td>
        </tr>
        <tr>
            <th>Medical</th>
            <td>{{ number_format($employeeSalary->medical,2) }}</td>
        </tr>
        <tr>
            <th>Transport</th>
            <td>{{ number_format($employeeSalary->transport,2) }}</td>
        </tr>
        <tr>
            <th>Overtime Amount</th>
            <td>{{ number_format($employeeSalary->overtime_amount,2) }}</td>
        </tr>
        <tr>
            <th>Absent Deduction</th>
            <td>{{ number_format($employeeSalary->absent_deduction,2) }}</td>
        </tr>
        <tr>
            <th>Gross Salary</th>
            <td>{{ number_format($employeeSalary->gross_salary,2) }}</td>
        </tr>
        <tr>
            <th>Net Salary</th>
            <td>{{ number_format($employeeSalary->net_salary,2) }}</td>
        </tr>
    </table>

    <a href="{{ route('employee-salaries.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
