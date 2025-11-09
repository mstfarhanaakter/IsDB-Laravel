<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'order_no',
        'order_date',
        'delivery_date',
        'total_qty',
        'status'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Relationships
    public function buyer() {
        return $this->belongsTo(Buyer::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function productions() {
        return $this->hasMany(Production::class);
    }

    // Status helpers
    public function isCompleted() {
        return $this->status === self::STATUS_COMPLETED;
    }
}
