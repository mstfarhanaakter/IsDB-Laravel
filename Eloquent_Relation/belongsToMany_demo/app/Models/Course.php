<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name', 'department'];
    public function students(){
        return $this->belongsToMany(
            Student::class,
            'enrollments', 
            'course_id', 
            'student_id');
    }
}
