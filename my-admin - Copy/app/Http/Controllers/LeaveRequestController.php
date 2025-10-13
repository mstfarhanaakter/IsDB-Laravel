<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::with('employee')->latest()->get();
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $data = $request->all();
        $data['total_days'] = (strtotime($data['to_date']) - strtotime($data['from_date'])) / 86400 + 1;
        LeaveRequest::create($data);

        return redirect()->route('leaves.index')->with('success', 'Leave request submitted!');
    }

    public function approve($id)
    {
        LeaveRequest::findOrFail($id)->update(['status' => 'Approved']);
        return back()->with('success', 'Leave approved!');
    }

    public function reject($id)
    {
        LeaveRequest::findOrFail($id)->update(['status' => 'Rejected']);
        return back()->with('success', 'Leave rejected!');
    }
}
 