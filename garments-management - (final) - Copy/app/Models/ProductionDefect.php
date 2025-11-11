<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionDefect extends Model
{
    use HasFactory;

    // Table name (optional if Laravel naming conventions are followed)
    protected $table = 'production_defects';

    // Mass assignable fields
    protected $fillable = [
        'production_id',
        'defect_type',
        'defect_qty',
        'reported_by',
        'description',
        'image_path',
        'status',
    ];

    /**
     * Relationship with Production
     */
    public function production()
    {
        return $this->belongsTo(Production::class);
    }
}
