<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function productions()
    {
        return $this->hasMany(Production::class, 'line_id');
    }
}
