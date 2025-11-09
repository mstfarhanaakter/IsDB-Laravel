<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['order_id','department_id','start_date','end_date','completed_qty','status'];
    public function order() { return $this->belongsTo(Order::class); }
    public function department() { return $this->belongsTo(Department::class); }
}
