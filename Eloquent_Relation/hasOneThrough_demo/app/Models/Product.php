<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id'); //belongsTo ব্যবহার করা হয়েছে category এর জন্য।
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id'); //hasMany ব্যবহার করা হয়েছে orders এর জন্য।
    }
}
