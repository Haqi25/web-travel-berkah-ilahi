<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Route extends Model
{
    use SoftDeletes;

    protected $fillable = ['origin', 'destination', 'price', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function schedule(){
         return $this->hasMany(Schedule::class);
    }
}
