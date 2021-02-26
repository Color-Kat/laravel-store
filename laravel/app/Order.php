<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function calculate() {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price * $product->pivot->count;
        }

        return $sum;
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
}
