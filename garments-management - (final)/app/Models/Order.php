<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   use HasFactory;
    protected $fillable = ['buyer_id','order_no','order_date','delivery_date','total_qty','status'];


    // Cast dates to Carbon instances
    protected $casts = [
        'order_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];
    public function buyer() { return $this->belongsTo(Buyer::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
}
