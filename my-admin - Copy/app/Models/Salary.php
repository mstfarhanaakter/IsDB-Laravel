<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'month',
        'basic_salary',
        'overtime_hours',
        'overtime_rate',
        'allowance',
        'deduction',
        'net_salary',
        'payment_status',
        'payment_date',
    ];

    // ✅ Each salary belongs to an Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
