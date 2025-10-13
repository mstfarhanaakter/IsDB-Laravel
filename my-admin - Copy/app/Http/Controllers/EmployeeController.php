<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // ✅ All Employees
    public function index()
    {
        $employees = Employee::with('department')->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    // ✅ Add Employee Form
    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    // ✅ Store Employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'joining_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'designation' => 'required|string|max:100',
        ]);

        $data = $request->all();
        $data['employee_code'] = 'EMP-' . str_pad(Employee::count() + 1, 3, '0', STR_PAD_LEFT);

        // Image upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    // ✅ Edit Employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    // ✅ Update Employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // ✅ Delete Employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted!');
    }
}
