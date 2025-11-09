<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'company_name', 'contact_no', 'email', 'address'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
