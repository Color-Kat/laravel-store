<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\models\Category;
use App\models\Order;
use App\models\Product;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
//        Log::channel('single')->info($request->ip());
//        \Debugbar::info('Your ip, exexexe: '. $request->ip());
//        $products_query = Product::with('category');
        $products_query = Product::with('category');

//        \Debugbar::info($request->has('price_from'));
        if($request->filled('price_to')) {
            $products_query->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')) {
            $products_query->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'recommend', 'new'] as $label) {
            if($request->has($label)) {
//                $products_query->where($label, 1);
                $products_query->$label();
            }
        }

        $products = $products_query->paginate(6)->withPath('?'.$request->getQueryString());

        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category->id)->get();

        return view('category', compact('category'));
    }

    public function product($category, $productCode)
    {
        $product = Product::withTrashed()->where('code', $productCode)->first();
//        dd($product);
        return view('product', ['product' => $product]);
    }
}
