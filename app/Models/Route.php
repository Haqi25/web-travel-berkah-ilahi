<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Route extends Model
{
    use SoftDeletes;

    protected $fillable = ['origin', 'destination', 'price', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function schedule(){
         return $this->hasMany(Schedule::class);
    }
}
