<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Application extends Model
{
    protected $fillable =['name'];

    //Application Many Environments

    public function environments(){
        // // singular column name, not plural
        return $this-> hasMany(Environment::class, 'application_id');
    }


    public function deployments(): HasManyThrough{
        return $this->hasManyThrough(
        Deployment::class, // final model
         Environment::class,  // intermediate model
         'application_id',
         'environment_id',
         'id',
         'id'
        );
    }
}
