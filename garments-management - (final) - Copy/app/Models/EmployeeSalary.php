<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    // Fillable fields (so you can mass-assign)
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

    // Optional: cast some fields to numeric types
    protected $casts = [
        'basic' => 'double',
        'house_rent' => 'double',
        'medical' => 'double',
        'transport' => 'double',
        'overtime_amount' => 'double',
        'absent_deduction' => 'double',
        'gross_salary' => 'double',
        'net_salary' => 'double',
        'year' => 'integer',
    ];

    // Relation to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
