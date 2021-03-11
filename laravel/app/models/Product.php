<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

//    public function getCategory()
//    {
//        $category = Category::find($this->category_id);
//        return $category->name;
//    }
    protected $fillable = ['name', 'category_id', 'code', 'description', 'price', 'image', 'new', 'hit', 'recommend',
                           'count'];

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

    public function scopeHit($query) {
        return $query->where('hit', 1);
    }

    public function scopeNew($query) {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query) {
        return $query->where('recommend', 1);
    }

    public function isNew(){
        return $this->new === 1;
    }

    public function isHit() {
        return $this->hit === 1;
    }

    public function isRecommend() {
        return $this->recommend === 1;
    }

    public function setNewAttribute($value) {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }
    public function setHitAttribute($value) {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }
    public function setRecommendAttribute($value) {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    public function isAvailable() {
        return $this->count > 0 && !$this->trashed();
    }
}
