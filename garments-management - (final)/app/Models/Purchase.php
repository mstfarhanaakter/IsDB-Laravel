<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{   use HasFactory ;
    protected $fillable = ['supplier_id', 'material_id', 'purchase_date', 'total_amount'];
    public function supplier() { return $this->belongsTo(Supplier::class); }
    public function items() { return $this->hasMany(PurchaseItem::class); }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
