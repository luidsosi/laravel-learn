<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['idClient', 'valueTotal'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'idOrder');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient');
    }
}
