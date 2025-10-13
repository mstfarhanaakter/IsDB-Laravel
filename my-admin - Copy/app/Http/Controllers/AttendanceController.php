<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(20);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendances.index')->with('success', 'Attendance saved!');
    }

    public function destroy($id)
    {
        Attendance::destroy($id);
        return redirect()->route('attendances.index')->with('success', 'Record deleted!');
    }
}
