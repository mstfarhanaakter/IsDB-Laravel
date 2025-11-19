<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    // 🔹 Mass assignable fields
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic',
        'house_rent',
        'medical',
        'transport',
        'overtime_amount',
        'absent_deduction',
        'gross_salary',
        'net_salary',
    ];

    // 🔹 Employee relationship
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // 🔹 Accessor to get month name from month number
    public function getMonthNameAttribute()
    {
        return \Carbon\Carbon::create()->month($this->month)->format('F');
    }
}
