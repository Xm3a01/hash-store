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
Route::group(['prefix' => '/dashboard' , 'middleware' => 'auth:admin'] , function(){
    Route::get('/' , 'Admin\IndexController@index')->name('admins.dashboard');
    Route::resource('categories','Admin\Dashboard\CategoryController');
    Route::resource('orders','Admin\Dashboard\OrderController');
    Route::resource('users','Admin\Dashboard\UserController');
    Route::resource('products', 'Admin\Dashboard\ProductController');
    Route::resource('admins', 'Admin\Dashboard\AdminController');
  });


  require __DIR__.'/admin.php';



Route::get('website-products' , 'Website\ProductController@index')->name('website.products')->middleware('website');
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

Route::get('sinOut', function () {
  Auth::guard('web')->logout();
  return redirect()->route('login');
});