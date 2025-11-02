<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'supply_id',
        'quantity',
        'price',
        'status',
        'order_date'
    ];

    // Supplier এর সাথে সম্পর্ক
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Supply এর সাথে সম্পর্ক
    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
