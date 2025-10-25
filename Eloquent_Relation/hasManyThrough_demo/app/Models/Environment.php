<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $fillable = ['name', 'application_id'];
    public function applications(){
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function deployments(){
        return $this->hasMany(Deployment::class, 'environment_id');
    }
}
