<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['order_id','shipment_date','carrier_name','tracking_no','delivery_status'];
    public function order() { return $this->belongsTo(Order::class); }
}
