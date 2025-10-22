<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'name',
        'image',
        'description',
        'old_price',
        'new_price',
    ];
}
