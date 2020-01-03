<?php


namespace App\Dao;


use App\Client;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\DB;
use function foo\func;

class ClientDao
{
    public function create(String $name, int $orderQuantity, int $itensOrderQuantity): Client
    {
        $newClient = null;
        DB::beginTransaction();
        $newClient = Client::create([
            'name' => $name
        ]);

        $this->createOrders($orderQuantity, $newClient, $itensOrderQuantity);
        DB::commit();

        return $newClient;
    }

    private function createOrders(int $orderQuantity, $newClient, int $itensOrderQuantity): void
    {
        for ($i = 1; $i <= $orderQuantity; $i++) {
            $newOrder = $newClient->orders()->create([
                'valueTotal' => $i
            ]);

            $this->createOrderItens($itensOrderQuantity, $newOrder, $i);
        }
    }

    private function createOrderItens(int $itensOrderQuantity, $newOrder, int $i): void
    {
        for ($j = 1; $j <= $itensOrderQuantity; $j++) {
            $newOrderItem = $newOrder->orderItems()->create([
                'item' => $j,
                'price' => $j,
                'quantity' => $i,
                'total' => $i * $j
            ]);
        }
    }

    public function delete($clientId): Client
    {
        $client = Client::find($clientId);

        DB::transaction(function () use ($client) {
            $this->deleteOrders($client);
            $client->delete();
        });

        return $client;
    }

    private function deleteOrders($client): void
    {
        $client->orders->each(function (Order $order) {
            $this->deleteOrderItens($order);
            $order->delete();
        });
    }

    private function deleteOrderItens(Order $order): void
    {
        $order->orderItems->each(function (OrderItem $orderItem) {
            $orderItem->delete();
        });
    }


}
