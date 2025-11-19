<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\SalarySetting;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF; // For PDF download

class SalaryController extends Controller
{
    // 📌 Show all salary sheets
    public function index()
    {
        $salaries = EmployeeSalary::with('employee')->orderBy('year','desc')->orderBy('month','desc')->get();
        return view('salaries.index', compact('salaries'));
    }

    // 📌 Show form to select month/year
    public function create()
    {
        return view('salaries.create');
    }

    // 📌 Generate salary sheet for selected month/year
    public function generateSalary(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required|integer',
        ]);

        $month = $request->month;
        $year = $request->year;

        $salarySettings = SalarySetting::first();
        $employees = Employee::all();

        foreach($employees as $employee) {
            $attendances = Attendance::where('employee_id',$employee->id)
                            ->whereMonth('date', date('m', strtotime("$month 1")))
                            ->whereYear('date', $year)
                            ->get();

            $presentDays = $attendances->where('status','Present')->count();
            $absentDays = $attendances->where('status','Absent')->count();
            $overtimeHours = $attendances->sum('overtime_hours'); // Attendance table-এ OT column থাকা উচিত

            $workingDays = $attendances->count() ?: 1; // avoid division by zero
            $perDaySalary = $employee->salary / $workingDays;

            // Salary calculation
            $basic = $employee->salary * $salarySettings->basic_percentage / 100;
            $houseRent = $employee->salary * $salarySettings->house_rent_percentage / 100;
            $medical = $salarySettings->medical_allowance;
            $transport = $salarySettings->transport_allowance;
            $overtimeAmount = $overtimeHours * $salarySettings->overtime_rate;
            $absentDeduction = $perDaySalary * $absentDays;

            $gross = $basic + $houseRent + $medical + $transport + $overtimeAmount;
            $net = $gross - $absentDeduction;

            EmployeeSalary::updateOrCreate(
                ['employee_id'=>$employee->id,'month'=>$month,'year'=>$year],
                [
                    'basic'=>$basic,
                    'house_rent'=>$houseRent,
                    'medical'=>$medical,
                    'transport'=>$transport,
                    'overtime_amount'=>$overtimeAmount,
                    'absent_deduction'=>$absentDeduction,
                    'gross_salary'=>$gross,
                    'net_salary'=>$net,
                ]
            );
        }

        return redirect()->route('salaries.index')
                         ->with('success','Salary sheet generated successfully!');
    }

    // 📌 Show single salary slip
    public function show($id)
    {
        $salary = EmployeeSalary::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    // 📌 Download salary slip as PDF
    // public function downloadPDF($id)
    // {
    //     $salary = EmployeeSalary::with('employee')->findOrFail($id);
    //     $pdf = PDF::loadView('salaries.pdf', compact('salary'));
    //     return $pdf->download('salary_'.$salary->employee->first_name.'_'.$salary->month.'.pdf');
    // }
}
