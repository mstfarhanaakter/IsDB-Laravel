<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = ['name', 'employee_no'];

    // Relationship: একটি Department-এ অনেক Employee থাকতে পারে
     public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
