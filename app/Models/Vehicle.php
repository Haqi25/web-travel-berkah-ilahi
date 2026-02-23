<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Vehicle extends Model
{
    use SoftDeletes,  HasFactory;

    protected $fillable = ['name', 'image', 'plate_number', 'capacity', 'status', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
