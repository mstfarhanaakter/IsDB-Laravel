<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = ['name', 'email', 'phone', 'address'];

    public function supplies() {
    return $this->hasMany(Supply::class);
}

public function purchaseOrders() {
    return $this->hasMany(PurchaseOrder::class);
}

}
