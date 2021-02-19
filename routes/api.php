<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => 'auth:api'] , function(){
    Route::post('logout', 'Api\Auth\AuthController@logout');
    Route::resource('products','Api\ProductController')->only(['show', 'index']);
    Route::get('categories','Api\CategoryController@index')->name('category.index');
    Route::get('categories','Api\CategoryController@index')->name('category.index');
    Route::get('orders/{carts}','Api\OrderController@store')->name('order.index');
});

Route::group(['prefix' => 'free'] , function(){
    Route::resource('products','Api\ProductController')->only(['show', 'index']);
    Route::get('categories','Api\CategoryController@index')->name('category.index');
    Route::get('categories','Api\CategoryController@index')->name('category.index');
    Route::get('orders/{carts}','Api\OrderController@store')->name('order.index');
});

Route::post('login', 'Api\Auth\AuthController@login');
Route::post('register', 'Api\Auth\AuthController@register');
