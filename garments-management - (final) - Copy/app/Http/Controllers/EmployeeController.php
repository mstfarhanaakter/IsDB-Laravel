<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created!');
    }
}

