<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'basic_percentage',
        'house_rent_percentage',
        'medical_allowance',
        'transport_allowance',
        'overtime_rate',
    ];
}

