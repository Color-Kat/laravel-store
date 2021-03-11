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

Route::get('/', 'MainController@index')->name('index');

// ------- BASKET ------ //
Route::group([
    'prefix' => 'basket'
], function () {

    Route::group([
        'middleware' => ['basket_is_not_empty'],
    ], function () {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@order')->name('order');
        Route::post('/place', 'BasketController@orderConfirm')->name('order-confirm');
    });

    Route::post('/add/{product}', 'BasketController@basketAdd')->name('basketAdd');
    Route::post('/sub/{product}', 'BasketController@basketSub')->name('basketSub');
});

// ------- END BASKET ------ //

Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/categories/{category}', 'MainController@category')->name('category');

Route::get('/categories/{category}/{product}', 'MainController@product')->name('product');

Auth::routes([
    'reset'   => false,
    'confirm' => false,
    'verify'  => false,
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::middleware(['auth'])->group(function () {

    Route::group([
        'prefix'    => 'person',
        'namespace' => 'Person',
        'as'        => 'person.'
    ], function () {
        Route::get('/orders', 'OrdersController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrdersController@show')->name('order.show');
    });

    Route::group([
        'namespace' => 'Admin',
        'prefix'    => 'admin'
    ],
        function () {
            Route::group([
                'middleware' => ['is_admin']
            ], function () {
                Route::get('/orders', 'OrdersController@index')->name('home');
                Route::get('/orders/{order}', 'OrdersController@show')->name('order.show');
            });

            Route::resource('/categories', 'CategoryController');
            Route::resource('/products', 'ProductController');
        });
});

Route::get('/reset', 'ResetController@reset')->name('reset');



