<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    protected $fillable = ['name', 'details'];
    public function comments(){
        return $this->hasMany((Comment::class));
    }
}
