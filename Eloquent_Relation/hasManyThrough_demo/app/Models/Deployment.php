<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
   protected $fillable =['commit_hash','environment_id'];
   public function environments(){
    return $this->belongsTo(Environment::class, 'environment_id');
   }
}
