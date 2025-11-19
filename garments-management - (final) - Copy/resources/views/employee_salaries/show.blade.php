@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Salary Details</h2>

    <table class="table table-bordered">
        <tr><th>Employee</th><td>{{ $employeeSalary->employee->name ?? 'N/A' }}</td></tr>
        <tr><th>Month</th><td>{{ $employeeSalary->month }}</td></tr>
        <tr><th>Year</th><td>{{ $employeeSalary->year }}</td></tr>
        <tr><th>Basic</th><td>{{ $employeeSalary->basic }}</td></tr>
        <tr><th>House Rent</th><td>{{ $employeeSalary->house_rent }}</td></tr>
        <tr><th>Medical</th><td>{{ $employeeSalary->medical }}</td></tr>
        <tr><th>Transport</th><td>{{ $employeeSalary->transport }}</td></tr>
        <tr><th>Overtime Amount</th><td>{{ $employeeSalary->overtime_amount }}</td></tr>
        <tr><th>Absent Deduction</th><td>{{ $employeeSalary->absent_deduction }}</td></tr>
        <tr><th>Gross Salary</th><td>{{ $employeeSalary->gross_salary }}</td></tr>
        <tr><th>Net Salary</th><td>{{ $employeeSalary->net_salary }}</td></tr>
    </table>

    <a href="{{ route('employee-salaries.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
