<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'order_number',
        'order_date',
        'delivery_date',
        'total_qty',
        'status',
    ];

     protected $casts = [
        'order_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $latestOrder = static::latest('id')->first();
                $nextId = $latestOrder ? $latestOrder->id + 1 : 1;
                $order->order_number = 'ORD-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
