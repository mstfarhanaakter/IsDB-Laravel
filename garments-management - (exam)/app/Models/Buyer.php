<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model

{   
    use HasFactory;
    protected $fillable = ['organization_name', 'name','email','phone'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
