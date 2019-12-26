<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['item', 'price', 'quantity', 'total', 'idOrder'];

    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
