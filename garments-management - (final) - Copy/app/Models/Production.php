<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'order_id',
        'department_id',
        'start_date',
        'end_date',
        'completed_qty',
        'status',
    ];

    // Cast dates to Carbon instances
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships

    // Each production belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Each production belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
