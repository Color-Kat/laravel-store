<?php


namespace App\classes;


use App\models\Order;
use App\models\Product;
use Illuminate\Support\Facades\Auth;

class basket
{

    protected $order;

    /**
     * basket constructor.
     * @param $order
     */
    public function __construct($_create_order = false)
    {
        $orderId = session('orderId');

        if (is_null($orderId) && $_create_order) {
            if(Auth::check()) {
                $this->order->user_id = Auth::id();
                $this->order->save();
            }

            $this->order = Order::create();

            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($orderId);
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $surname, $phone)
    {
        return $this->order->saveOrder(
            $name, $surname, $phone
        );
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;

            if ($pivotRow->count === 1) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        Order::changeSum(-$product->price);
    }

    public function addProduct(Product $product)
    {
        if (!$this->order->products->contains($product->id)) {
            $this->order->products()->attach($product->id);
        } else {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }

        Order::changeSum($product->price);
    }
}
