<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'supplier_id',
        'quantity',
        'unit_price',
    ];

    /**
     * Relation: PurchaseItem belongs to Material
     */
    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * Relation: PurchaseItem belongs to Supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Accessor: Total price
     */
    public function getTotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }

    /**
     * Booted method to handle stock automatically
     */
    protected static function booted()
    {
        // Increase stock when a new purchase item is created
        static::created(function ($purchaseItem) {
            if ($material = $purchaseItem->material) {
                $material->current_stock += $purchaseItem->quantity;
                $material->save();
            }
        });

        // Adjust stock when a purchase item is updated
        static::updating(function ($purchaseItem) {
            if ($material = $purchaseItem->material) {
                $originalQuantity = $purchaseItem->getOriginal('quantity');
                $difference = $purchaseItem->quantity - $originalQuantity;
                $material->current_stock += $difference;
                $material->save();
            }
        });

        // Decrease stock when a purchase item is deleted
        static::deleted(function ($purchaseItem) {
            if ($material = $purchaseItem->material) {
                $material->current_stock -= $purchaseItem->quantity;
                $material->save();
            }
        });
    }
}
