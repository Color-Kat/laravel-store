<?php

namespace App\Http\Controllers;


use App\classes\basket;
use App\models\Order;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new basket())->getOrder();

        return view('basket', compact('order'));
    }

    public function order()
    {
        $order = (new basket())->getOrder();
        return view('order', ['price' => $order->calculate()]);
    }

    public function basketAdd(Product $product)
    {
        (new basket(true))->addProduct($product);

        session()->flash('success', 'Вы добавили в корзину '.$product->name);

        return redirect()->route('basket');
    }

    public function basketSub(Product $product)
    {
        (new basket())->removeProduct($product);



        session()->flash('warning', 'Вы удалили товар '.$product->name);

        return redirect()->route('basket');
    }

    public function orderConfirm(Request $request) {
        $success = (new basket())->saveOrder($request->name, $request->surname, $request->phone);

        if($success) session()->flash('success', 'Ваш заказ принят в обработку');
        else session()->flash('warning', 'Произошла ошибка');

        session()->forget('orderId');

        Order::eraseOrderSum();

        return redirect()->route('index');
    }
}
