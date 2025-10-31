<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_date',
        'line',
        'order_no',
        'produced_qty',
        'defect_qty',
        'remarks'
    ];
}
