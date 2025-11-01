<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'salary',
        'joining_date'
    ];

    // Relationship: Employee -> Department
    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
