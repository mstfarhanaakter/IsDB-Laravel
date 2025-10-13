<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(20);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required',
            'basic_salary' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['net_salary'] = $data['basic_salary'] + $data['allowance'] - $data['deduction'];

        Salary::create($data);
        return redirect()->route('salaries.index')->with('success', 'Salary record created!');
    }

    public function updateStatus($id)
    {
        $salary = Salary::findOrFail($id);
        $salary->update(['payment_status' => 'Paid', 'payment_date' => now()]);
        return back()->with('success', 'Salary marked as paid!');
    }
}
