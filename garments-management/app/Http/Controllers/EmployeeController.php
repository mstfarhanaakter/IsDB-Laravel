<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * সব Employee এর list দেখাবে
     */
    public function index()
    {
        // সব employee ডাটাবেজ থেকে নিয়ে আসা
        $employees = Employee::all();
        // index view এ পাঠানো
        return view('employees.index', compact('employees'));
    }

    /**
     * নতুন employee create করার form দেখাবে
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * নতুন employee ডাটাবেজে সংরক্ষণ করবে
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employee,email',
            'phone' => 'nullable|numeric',
            'department' => 'nullable|string|max:100',
            'salary' => 'nullable|numeric',
            'joining_date' => 'nullable|date',
        ]);

        // Employee create করা
        Employee::create($request->all());

        // Success message সহ redirect
        return redirect()->route('employees.index')
                         ->with('success', 'Employee added successfully.');
    }

    /**
     * নির্দিষ্ট employee এর বিস্তারিত দেখাবে
     */
    public function show(Employee $employee)
    {
        // Show view এ employee পাঠানো
        return view('employees.show', compact('employee'));
    }

    /**
     * নির্দিষ্ট employee edit form দেখাবে
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * নির্দিষ্ট employee update করবে
     */
    public function update(Request $request, Employee $employee)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employee,email,' . $employee->id,
            'phone' => 'nullable|numeric',
            'department' => 'nullable|string|max:100',
            'salary' => 'nullable|numeric',
            'joining_date' => 'nullable|date',
        ]);

        // Employee update করা
        $employee->update($request->all());

        // Success message সহ redirect
        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully.');
    }

    /**
     * নির্দিষ্ট employee delete করবে
     */
    public function destroy(Employee $employee)
    {
        // Employee delete করা
        $employee->delete();

        // Success message সহ redirect
        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted successfully.');
    }
}
