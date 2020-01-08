<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
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

    public function getOrderItemsChecked(): Collection
    {
        return $this->orderItems->filter(function (OrderItem $item) {
            return $item->checked;
        });
    }
}
