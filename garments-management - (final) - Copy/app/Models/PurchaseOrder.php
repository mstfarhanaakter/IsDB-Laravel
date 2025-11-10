<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [ 'supplier_id', 'order_date', 'status', 'total_amount', 'remarks'];

    protected $casts = [
        'order_date' => 'date',
    ];


    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function items() {
        return $this->hasMany(PurchaseItem::class);
    }

    // Total amount of this PO
    public function getTotalAmountAttribute() {
        return $this->items->sum(fn($item)=>$item->quantity * $item->unit_price);
    }
}

