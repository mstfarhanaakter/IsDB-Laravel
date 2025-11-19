<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    // 📌 All Employees List (NO PAGINATE)
    public function index()
    {
        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees'));
    }

    // 📌 Create Form
    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }
    public function show($id)
    {
        $employee = Employee::with('department')->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    // 📌 Store New Employee
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position' => 'nullable',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Employee created successfully!');
    }

    // 📌 Edit Form
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('employees.edit', compact('employee', 'departments'));
    }

    // 📌 Update Employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => "required|email|unique:employees,email,$id",
            'phone' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position' => 'nullable',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully!');
    }

    // 📌 Delete Employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted!');
    }
}
