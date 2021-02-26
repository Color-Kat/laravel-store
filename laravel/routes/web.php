<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MainController@home')->name('index');

Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/basket/place', 'BasketController@order')->name('order');
Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basketAdd');
Route::post('/basket/sub/{id}', 'BasketController@basketSub')->name('basketSub');
Route::post('/basket/place', 'BasketController@orderConfirm')->name('order-confirm');

Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/categories/{category}', 'MainController@category')->name('category');

Route::get('/categories/{category}/{product}', 'MainController@product')->name('product');

Auth::routes([
    'reset'   => false,
    'confirm' => false,
    'verify'  => false,
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::group([
    'middleware' => ['auth'],
    'namespace' => 'Admin'
],
    function () {
        Route::group([
            'middleware' => ['is_admin']
        ], function() {
            Route::get('/orders/index', 'OrdersController@index')->name('home');
        });

    });

