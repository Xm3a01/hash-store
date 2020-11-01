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



Route::get('/' , 'IndexController@index')->name('index');
Route::group(['prefix' => '/' , 'middleware' => 'auth:admin'] , function(){
    Route::get('dashboard' , 'Admin\IndexController@index')->name('admins.dashboard');
    Route::resource('categories','Admin\Dashboard\CategoryController');
    Route::resource('orders','Admin\Dashboard\OrderController');
  });
  Route::resource('products','Admin\Dashboard\ProductController');



Route::get('admins/login','Admin\Auth\LoginController@showAdminLoginForm')->name('admins.login');
Route::post('admins/login', 'Admin\Auth\LoginController@login')->name('admins.login');
Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');

Route::get('products' , 'Website\ProductController@index')->middleware('website');
Route::get('last-products','Website\ProductController@lastProduct')->name('last.products');

// Cart
Route::get('cart/{id}' , 'CartController@addItem')->name('cart');
Route::get('cart-update' , 'CartController@updateItem')->name('cart.update');
Route::get('cart-delete' , 'CartController@delete')->name('cart.delete');
Route::get('cart-delete-all' , 'CartController@deleteAll')->name('cart.delete.all');
Route::get('get-cartItems' , 'CartController@cartItems')->name('cart.items');

//
Route::get('test','CartController@saveOrder');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/ui', 'ui.index');