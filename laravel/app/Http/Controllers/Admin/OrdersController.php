<?php

namespace App\Http\Controllers\Admin;

use App\models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::active()->get();

        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
//      Можно добавить Order как параметр
//      Или можно так найти
//      $order = Order::find($order_id);

        $products = $order->products()->withTrashed()->get();

        return view('auth.orders.show', compact('order', 'products'));
    }
}
