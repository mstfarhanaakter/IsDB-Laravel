<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'supplier_id',
        'quantity',
        'price',
        'purchase_date'
    ];

    public function material()
    {
        return $this->belongsTo(RawMaterial::class, 'material_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
