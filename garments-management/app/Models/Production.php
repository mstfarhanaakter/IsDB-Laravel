<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    protected $fillable = [
        'order_no',
        'production_date',
        'produced_qty',
        'defect_qty',
        'remarks',
        'is_completed',
        'line_id'
    ];

    public function line()
    {
        return $this->belongsTo(ProductionLine::class, 'line_id');
    }

}
