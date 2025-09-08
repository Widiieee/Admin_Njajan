<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function order() { return $this->belongsTo(Order::class); }
}
