<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function deletedOrder()
    {
        return Order::onlyTrashed()->get();
    }

    public function create(array $data): Order
    {
        $order = Order::create($data);
        return $order;
    }
}