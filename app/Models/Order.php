<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
        'total',
    ];

    // 👇 Tambahkan ini
    protected $casts = [
        'order_date' => 'datetime',
    ];

    public function customer() 
    { 
        return $this->belongsTo(Customer::class); 
    }

    public function details() 
    { 
        return $this->hasMany(OrderDetail::class); 
    }

    public function sale() 
    { 
        return $this->hasOne(Sale::class); 
    }
}
