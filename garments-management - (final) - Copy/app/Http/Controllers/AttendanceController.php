<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttendanceController extends Controller
{
    // 📌 Show All Attendance
    public function index()
    {
        $attendances = Attendance::with('employee')->orderBy('date', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }

    // 📌 Show Create Form
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    // 📌 Store Attendance
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'status'      => 'required|in:Present,Absent,Leave',
        ]);

        // Same employee same date → forbidden
        $exists = Attendance::where('employee_id', $request->employee_id)
                            ->where('date', $request->date)
                            ->first();

        if ($exists) {
            return back()->with('error', 'Attendance already taken for this employee on this date!');
        }

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance Recorded Successfully');
    }

    // 📌 Show Single Attendance
    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    // 📌 Edit Form
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees  = Employee::all();

        return view('attendances.edit', compact('attendance', 'employees'));
    }

    // 📌 Update Attendance
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'status'      => 'required|in:Present,Absent,Leave',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance Updated Successfully');
    }

    // 📌 Delete Attendance
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance Deleted');
    }
}
