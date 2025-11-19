<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionDefect extends Model
{
    use HasFactory;

    protected $fillable = [
        'productions_line_id',
        'order_id',
        'defect_type',
        'defect_qty',
        'reported_by',
        'description',
        'image_path',
        'status',
    ];

    public function productionLine()
    {
        return $this->belongsTo(ProductionLine::class, 'productions_line_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
