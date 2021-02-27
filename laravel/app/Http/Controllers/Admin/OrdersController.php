<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::where('status', 1)->get();

        return view('auth.orders.index', compact('orders'));
    }
}
