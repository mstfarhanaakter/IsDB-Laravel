<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department_id',
        'position',
        'salary',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
    ];

    protected $appends = ['full_name'];

    // Relationship
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Full name accessor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Email mutator
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    // Scope: Search by name/email
    public function scopeSearchName($query, $keyword)
    {
        return $query->where('first_name', 'like', "%$keyword%")
                     ->orWhere('last_name', 'like', "%$keyword%")
                     ->orWhere('email', 'like', "%$keyword%");
    }

    // Scope: Filter by department
    public function scopeInDepartment($query, $deptId)
    {
        return $query->where('department_id', $deptId);
    }
}
