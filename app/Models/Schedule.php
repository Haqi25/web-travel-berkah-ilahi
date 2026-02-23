<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $fillable = ['route_id', 'driver_id', 'vehicle_id', 'departure_time', 'available_seat', 'status', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }



}
