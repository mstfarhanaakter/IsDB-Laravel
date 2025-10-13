<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'joining_date',
        'department_id',
        'designation',
        'salary',
        'shift',
        'phone',
        'address',
        'email',
        'nid_number',
        'bank_account',
        'emergency_contact',
        'photo',
        'status',
    ];

    // ✅ Belongs to one Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // ✅ One Employee has many Attendance Records
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // ✅ One Employee has many Salary Records
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    // ✅ One Employee has many Leave Requests
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
