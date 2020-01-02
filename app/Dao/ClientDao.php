<?php


namespace App\Dao;


use App\Client;

class ClientDao
{
    public function create(String $name, int $orderQuantity, int $itensOrderQuantity): Client
    {
        $newClient = Client::create([
            'name' => $name
        ]);

        for ($i = 1; $i <= $orderQuantity; $i++) {
            $newOrder = $newClient->orders()->create([
                'valueTotal' => $i
            ]);

            for ($j = 1; $j <= $itensOrderQuantity; $j++) {
                $newOrderItem = $newOrder->orderItems()->create([
                    'item' => $j,
                    'price' => $j,
                    'quantity' => $i,
                    'total' => $i * $j
                ]);
            }
        }

        return $newClient;
    }
}
