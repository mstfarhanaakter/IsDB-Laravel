@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-4">Add Employee Salary</h3>

            <form action="{{ route('employee-salaries.store') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Employee</label>
                            <select name="employee_id" class="form-control" required>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Month</label>
                            <select name="month" class="form-control" required>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ \Carbon\Carbon::createFromDate(null, $i, 1)->format('F') }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Year</label>
                            <input type="number" name="year" class="form-control" value="{{ date('Y') }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Basic</label>
                            <input type="number" step="0.01" name="basic" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>House Rent</label>
                            <input type="number" step="0.01" name="house_rent" class="form-control" required>
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Medical</label>
                            <input type="number" step="0.01" name="medical" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Transport</label>
                            <input type="number" step="0.01" name="transport" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Overtime Amount</label>
                            <input type="number" step="0.01" name="overtime_amount" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Absent Deduction</label>
                            <input type="number" step="0.01" name="absent_deduction" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Gross Salary</label>
                            <input type="number" step="0.01" name="gross_salary" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Net Salary</label>
                            <input type="number" step="0.01" name="net_salary" class="form-control" required>
                        </div>
                    </div>

                </div>

                <button class="btn btn-success mt-3">Save</button>
            </form>

        </div>
    </div>
</div>
@endsection
