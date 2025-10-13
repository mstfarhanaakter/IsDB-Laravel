<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'code' => 'required|unique:departments,code']);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated!');
    }

    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route('departments.index')->with('success', 'Department deleted!');
    }
}
