<?php

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

Route::get('/', 'PageController@index')->name('main');

Route::prefix('cart')->group(static function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::get('add_item/{product}', 'CartController@addItem');
    Route::get('delete_item/{product}', 'CartController@deleteItem');
    Route::get('change_quantity/{product}', 'CartController@changeQuantity');
});

Route::group(['prefix' => 'order',  'middleware' => 'order'], static function () {
    Route::get('/', 'OrderController@index')->name('order');
    Route::get('confirm', 'OrderController@confirm');
});
