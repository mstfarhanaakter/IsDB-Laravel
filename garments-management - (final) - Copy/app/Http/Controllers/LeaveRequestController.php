<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LeaveRequestController extends Controller
{
    // 📌 Show all leave requests
    public function index()
    {
        $leaveRequests = LeaveRequest::with('employee')->orderBy('created_at','desc')->get();
        return view('leave-requests.index', compact('leaveRequests'));
    }

    // 📌 Show create form
    public function create()
    {
        $employees = Employee::all();
        return view('leave-requests.create', compact('employees'));
    }

    // 📌 Store new leave request
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'reason'      => 'required|string',
            'status'      => 'required|in:Pending,Approved,Rejected',
        ]);

        LeaveRequest::create($request->all());

        return redirect()->route('leave-requests.index')
                         ->with('success', 'Leave request submitted successfully');
    }

    // 📌 Show single leave request
    public function show($id)
    {
        $leaveRequest = LeaveRequest::with('employee')->findOrFail($id);
        return view('leave-requests.show', compact('leaveRequest'));
    }

    // 📌 Edit form
    public function edit($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $employees = Employee::all();
        return view('leave-requests.edit', compact('leaveRequest','employees'));
    }

    // 📌 Update leave request
    public function update(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'reason'      => 'required|string',
            'status'      => 'required|in:Pending,Approved,Rejected',
        ]);

        $leaveRequest->update($request->all());

        return redirect()->route('leave-requests.index')
                         ->with('success', 'Leave request updated successfully');
    }

    // 📌 Delete leave request
    public function destroy($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->delete();

        return redirect()->route('leave-requests.index')
                         ->with('success', 'Leave request deleted successfully');
    }
}
