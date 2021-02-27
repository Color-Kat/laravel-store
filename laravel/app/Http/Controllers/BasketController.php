<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        $order = null;
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }

        return view('basket', compact('order'));
    }

    public function order()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }

        $order = Order::find($orderId);
        return view('order', ['price' => $order->calculate()]);
    }

    public function basketAdd($product_id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if (!$order->products->contains($product_id)) {
            $order->products()->attach($product_id);
        } else {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }

        if(Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $productName = Product::find($product_id)->name;
        session()->flash('success', 'Вы добавили в корзину '.$productName);

        return redirect()->route('basket');
    }

    public function basketSub($product_id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return view('basket', compact('order'));
        }

        $order = Order::find($orderId);

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;

            if ($pivotRow->count === 1) {
                $order->products()->detach($product_id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $productName = Product::find($product_id)->name;
        session()->flash('warning', 'Вы удалили товар '.$productName);

        return redirect()->route('basket');
    }

    public function orderConfirm(Request $request) {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return view('basket', compact('basket'));
        }
        $order = Order::find($orderId);

        $success = $order->saveOrder(
            $request->name, $request->surname, $request->phone
        );

        if($success) session()->flash('success', 'Ваш заказ принят в обработку');
        else session()->flash('warning', 'Произошла ошибка');

        session()->forget('orderId');

        return redirect()->route('index');
    }
}
