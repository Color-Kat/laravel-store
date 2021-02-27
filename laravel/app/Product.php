<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCategory()
//    {
//        $category = Category::find($this->category_id);
//        return $category->name;
//    }
    protected $fillable = ['name', 'category_id', 'code', 'description', 'price', 'image'];

    public function category()
    {
        // обратная связь
        // Принадлежит категории - значит в Product -> category лежит сам класс категорий, из которого можно
        // вытащить запись, category_id которой будет соответствовать id продукта
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getFullPrice()
    {
        return $this->pivot->count * $this->price;
    }
}
