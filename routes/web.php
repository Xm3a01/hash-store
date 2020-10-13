<?php

use App\Category;
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


Auth::routes();

Route::get('/' , 'IndexController@index')->name('index');


Route::group(['prefix' => 'admins' , 'middleware' => 'auth:admin'] , function(){
    Route::get('dashboard' , 'Admin\IndexController@index')->name('admins.dashboard');
    Route::resource('categories','Admin\Dashboard\CategoryController');
    Route::resource('products','Admin\Dashboard\ProductController');
    Route::resource('orders','Admin\Dashboard\OrderController');
});



Route::get('admins/login','Admin\Auth\LoginController@showAdminLoginForm')->name('admins.login');
Route::post('admins/login', 'Admin\Auth\LoginController@login')->name('admins.login');
Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');

Route::get('cart/{id}' , 'CartController@addItem')->name('cart');
Route::get('cart-get' , 'CartController@getItem')->name('cart.get');
Route::get('cart-update' , 'CartController@updateItem')->name('cart.update');
Route::get('cart-delete' , 'CartController@delete')->name('cart.delete');
Route::get('cart-delete-all' , 'CartController@deleteAll')->name('cart.delete.all');
Route::get('get-cartItems' , 'CartController@cartItems')->name('cart.items');

Route::get('test' , function(){
   return view('test');
});
