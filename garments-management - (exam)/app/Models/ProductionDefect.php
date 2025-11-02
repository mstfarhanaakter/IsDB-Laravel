<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionDefect extends Model
{
    protected $fillable = [
        'production_id', 'defect_type', 'defect_qty', 
        'reported_by', 'description', 'image_path', 'status'
    ];

    public function production()
    {
        return $this->belongsTo(Production::class);
    }
}
