<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
     use HasFactory;

     protected $table = 'stocktransactions';

    protected $fillable = [
        'material_id', 'type', 'quantity', 'transaction_date', 'reference'
    ];

    public function material()
    {
        return $this->belongsTo(RawMaterial::class, 'material_id');
    }
}
