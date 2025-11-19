<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSalary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeSalaryController extends Controller
{
    // Show all salaries
    public function index()
    {
        $salaries = EmployeeSalary::with('employee')->latest()->get();
        return view('employee_salaries.index', compact('salaries'));
    }

    // Show form to create a new salary
    public function create()
    {
        $employees = Employee::all(); // dropdown for selecting employee
        return view('employee_salaries.create', compact('employees'));
    }

    // Store new salary in DB
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string',
            'year' => 'required|integer',
            'basic' => 'required|numeric',
            'house_rent' => 'required|numeric',
            'medical' => 'required|numeric',
            'transport' => 'required|numeric',
            'overtime_amount' => 'nullable|numeric',
            'absent_deduction' => 'nullable|numeric',
            'gross_salary' => 'required|numeric',
            'net_salary' => 'required|numeric',
        ]);

        EmployeeSalary::create($request->all());

        return redirect()->route('employee-salaries.index')->with('success', 'Salary added successfully.');
    }

    // Show single salary
    public function show(EmployeeSalary $employeeSalary)
    {
        return view('employee_salaries.show', compact('employeeSalary'));
    }

    // Show form to edit salary
    public function edit(EmployeeSalary $employeeSalary)
    {
        $employees = Employee::all();
        return view('employee_salaries.edit', compact('employeeSalary', 'employees'));
    }

    // Update salary in DB
    public function update(Request $request, EmployeeSalary $employeeSalary)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string',
            'year' => 'required|integer',
            'basic' => 'required|numeric',
            'house_rent' => 'required|numeric',
            'medical' => 'required|numeric',
            'transport' => 'required|numeric',
            'overtime_amount' => 'nullable|numeric',
            'absent_deduction' => 'nullable|numeric',
            'gross_salary' => 'required|numeric',
            'net_salary' => 'required|numeric',
        ]);

        $employeeSalary->update($request->all());

        return redirect()->route('employee-salaries.index')->with('success', 'Salary updated successfully.');
    }

    // Delete salary
    public function destroy(EmployeeSalary $employeeSalary)
    {
        $employeeSalary->delete();
        return redirect()->route('employee-salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
