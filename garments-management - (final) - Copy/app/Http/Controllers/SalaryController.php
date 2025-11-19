<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\SalarySetting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SalaryController extends Controller
{
    public function index()
{
    $salaries = EmployeeSalary::with('employee')->latest()->paginate(20);
    return view('salaries.index', compact('salaries'));
}
public function create()
{
    return view('salaries.create'); // dropdown: month + year
}
public function generateSalary(Request $request)
{
    $month = $request->month;
    $year = $request->year;

    $salary_setting = SalarySetting::first(); // Company rules

    $employees = Employee::all();

    foreach($employees as $emp)
    {
        // এখানে attendance summary নাও
        $attendance = $this->getAttendance($emp->id, $month, $year);

        $basic = $emp->salary * $salary_setting->basic_percentage / 100;
        $house_rent = $emp->salary * $salary_setting->house_rent_percentage / 100;
        $medical = $salary_setting->medical_allowance;
        $transport = $salary_setting->transport_allowance;
        $overtime_amount = $attendance['overtime_hours'] * $salary_setting->overtime_rate;
        $per_day_salary = $emp->salary / $attendance['total_days'];
        $absent_deduction = $per_day_salary * $attendance['absent_days'];

        $gross_salary = $basic + $house_rent + $medical + $transport + $overtime_amount;
        $net_salary = $gross_salary - $absent_deduction;

        EmployeeSalary::updateOrCreate(
            [
                'employee_id' => $emp->id,
                'month' => $month,
                'year' => $year
            ],
            [
                'basic' => $basic,
                'house_rent' => $house_rent,
                'medical' => $medical,
                'transport' => $transport,
                'overtime_amount' => $overtime_amount,
                'absent_deduction' => $absent_deduction,
                'gross_salary' => $gross_salary,
                'net_salary' => $net_salary,
            ]
        );
    }

    return redirect()->route('salaries.index')->with('success', 'Salary Sheet সফলভাবে তৈরি হয়েছে!');
}

private function getAttendance($employee_id, $month, $year)
{
    // এখানে তোমার attendance table query করবে
    // Example:
    return [
        'total_days' => 30,
        'present_days' => 26,
        'absent_days' => 4,
        'overtime_hours' => 10
    ];
}
public function show(EmployeeSalary $salary)
{
    return view('salaries.show', compact('salary'));
}


}
