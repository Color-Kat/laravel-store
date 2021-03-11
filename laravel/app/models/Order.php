<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function calculate() {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->price * $product->pivot->count;
        }

        return $sum;
    }

    public static function getFullSum() {
        return session('full_order_price', 0);
    }

    public static function changeSum($price) {
        $sum = session('full_order_price') + $price;

        session(['full_order_price' => $sum]);
    }

    public static function eraseOrderSum() {
        session()->forget('full_order_price');
    }

    public function saveOrder($name, $surname, $phone) {
       if ($this->status === 0) {
           $this->name = $name;
           $this->surname = $surname;
           $this->phone = $phone;
           $this->status = 1;
           $this->save();

           return true;
       } else return false;
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
