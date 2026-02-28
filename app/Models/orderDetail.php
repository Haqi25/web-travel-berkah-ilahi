<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class orderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['order_id', 'seat_number', 'created_at', 'updated_at', 'amount', 'payment_date', 'payment_method', 'passenger_name', 'passenger_phone'];

    protected $dates = ['deleted_at'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
