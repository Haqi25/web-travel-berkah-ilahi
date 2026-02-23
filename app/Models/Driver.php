<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'license_number', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
