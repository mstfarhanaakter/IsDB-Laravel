<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $casts = [
    'is_completed' => 'boolean',
    'production_date' => 'date',
 ];

    protected $fillable = [
        'order_id',
        'production_date',
        'planned_qty',
        'produced_qty',
        'defect_qty',
        'remarks',
        'is_completed',
        'line_id',
    ];

    // Relation to order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation to production line
    public function line()
    {
        return $this->belongsTo(ProductionLine::class);
    }

    // Relation to production defects
    public function defects()
    {
        return $this->hasMany(ProductionDefect::class);
    }

    // Calculate production progress in percentage
    public function getProgressAttribute()
    {
        if ($this->planned_qty == 0) return 0;
        return min(100, round(($this->produced_qty / $this->planned_qty) * 100));
    }
}
