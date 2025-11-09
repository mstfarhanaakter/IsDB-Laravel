<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'current_stock',
        'supplier_id',
    ];

    // A material belongs to a supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Material has many Purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
