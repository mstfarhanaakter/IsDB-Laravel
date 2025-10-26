<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['product_id', 'name'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category()
{
    return $this->hasOneThrough(
        Categories::class,
        Product::class,
        'id',          // Foreign key on products table? Actually 'id' of product (default)
        'id',          // Foreign key on categories table? Actually 'id' of category
        'product_id',  // Local key on orders table
        'category_id'  // Local key on products table
    );
}

}





















