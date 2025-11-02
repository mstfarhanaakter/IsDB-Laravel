<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentsController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Departments::all();
        return view('departments.index', compact('departments'));
    }

    // Show form to create a new department
    public function create()
    {
        return view('departments.create');
    }

    // Store new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_no' => 'required|integer|min:0',
        ]);

        Departments::create($request->all());

        return redirect()->route('departments.index')
                         ->with('success', 'Department created successfully.');
    }

    // Show form to edit a department
    public function edit(Departments $department)
    {
        return view('departments.edit', compact('department'));
    }

    // Update an existing department
    public function update(Request $request, Departments $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_no' => 'required|integer|min:0',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')
                         ->with('success', 'Department updated successfully.');
    }

    // Delete a department
    public function destroy(Departments $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                         ->with('success', 'Department deleted successfully.');
    }
}
