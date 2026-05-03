<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class orderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['order_id', 'seat_number',  'passenger_name', 'passenger_phone', 'schedule_id'];

    protected $dates = ['deleted_at'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
