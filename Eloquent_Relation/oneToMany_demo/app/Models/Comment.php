<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'artical_id'];
    public function artical(){
        return $this->belongsTo(Artical::class, 'artical_id');
    }
}
