<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->get();

        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
//      Можно добавить Order как параметр
//      Или можно так найти
//      $order = Order::find($order_id);

        if(!Auth::user()->orders->contains($order))
            return redirect()->route('index');

        return view('auth.orders.show', compact('order'));
    }
}
