@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Salary Slip — {{ $salary->employee->full_name }}</h2>
    <p>Month: {{ $salary->month }} {{ $salary->year }}</p>

    <table class="table table-bordered">
        <tr>
            <th>Basic</th>
            <td>{{ number_format($salary->basic,2) }}</td>
        </tr>
        <tr>
            <th>House Rent</th>
            <td>{{ number_format($salary->house_rent,2) }}</td>
        </tr>
        <tr>
            <th>Medical</th>
            <td>{{ number_format($salary->medical,2) }}</td>
        </tr>
        <tr>
            <th>Transport</th>
            <td>{{ number_format($salary->transport,2) }}</td>
        </tr>
        <tr>
            <th>Overtime</th>
            <td>{{ number_format($salary->overtime_amount,2) }}</td>
        </tr>
        <tr>
            <th>Absent Deduction</th>
            <td>{{ number_format($salary->absent_deduction,2) }}</td>
        </tr>
        <tr>
            <th>Gross Salary</th>
            <td>{{ number_format($salary->gross_salary,2) }}</td>
        </tr>
        <tr>
            <th>Net Salary</th>
            <td>{{ number_format($salary->net_salary,2) }}</td>
        </tr>
    </table>

    <a href="{{ route('salaries.pdf',$salary->id) }}" class="btn btn-success">Download PDF</a>
    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
