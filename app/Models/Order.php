<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'seat_number',
        'booking_code',
        'status',
        'payment_url',
        'total_price',
        'invoice_url',
        'payment_channel',
        'payment_method',
        'created_at',
        'updated_at'

    ];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function details()
    {
        
        return $this->hasMany(orderDetail::class, 'order_id');
    }
}
