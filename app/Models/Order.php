<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'order_status', 'total_price'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
