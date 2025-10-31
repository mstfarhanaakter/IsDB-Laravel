<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
   use HasFactory;

     protected $table = 'rawmaterials'; // ডাটাবেসে থাকা টেবিলের সঠিক নাম

    protected $fillable = [
        'name',
        'category',
        'unit',
        'opening_stock',
        'current_stock',
        'reorder_level',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
