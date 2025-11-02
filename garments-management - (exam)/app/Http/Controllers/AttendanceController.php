<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->orderBy('date', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('name')->get();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'check_in'    => 'nullable|date_format:H:i',
            'check_out'   => 'nullable|date_format:H:i|after_or_equal:check_in',
            'status'      => 'required|in:Present,Absent,Late,On Leave',
            'remarks'     => 'nullable|string|max:255',
        ]);

        // Ensure one record per employee per day
        if (Attendance::where('employee_id', $request->employee_id)->where('date', $request->date)->exists()) {
            return redirect()->back()->withInput()->withErrors(['date' => 'Attendance for this employee on this date already exists.']);
        }

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('name')->get();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        // Validation
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date'        => 'required|date',
            'check_in'    => 'nullable|date_format:H:i',
            'check_out'   => 'nullable|date_format:H:i|after_or_equal:check_in',
            'status'      => 'required|in:Present,Absent,Late,On Leave',
            'remarks'     => 'nullable|string|max:255',
        ]);

        // Ensure one record per employee per day (excluding current)
        if (Attendance::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->where('id', '!=', $attendance->id)
            ->exists()) {
            return redirect()->back()->withInput()->withErrors(['date' => 'Attendance for this employee on this date already exists.']);
        }

        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}
