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




Route::group(['prefix' => '/dashboard' , 'middleware' => 'auth:admin'] , function(){

    Route::get('/' , 'Admin\IndexController@index')->name('admins.dashboard');
    Route::resource('products', 'Admin\Dashboard\ProductController');

     Route::group(['middleware' => 'is_admin'] , function(){
      Route::resource('categories','Admin\Dashboard\CategoryController');
      Route::resource('orders','Admin\Dashboard\OrderController');
      Route::resource('users','Admin\Dashboard\UserController');
      Route::resource('ads', 'Admin\Dashboard\AdsController');
      Route::resource('admins', 'Admin\Dashboard\AdminController');
      Route::get('super-admin/{admin}', 'Admin\Dashboard\AdminController@superAdmin')->name('super.admin');
    });
  });


  require __DIR__.'/admin.php';


// api for spa
Route::get('website-products' , 'Website\ProductController@index')->name('website.products');
Route::get('last-products','Website\ProductController@lastProduct')->name('last.products');
Route::get('website-categories','Website\ProductController@category')->name('website.categories');
Route::get('last-categories','Website\ProductController@lastCategory')->name('last.categories');
Route::get('authuser','Website\ProductController@authuser')->name('auth.user');
Route::get('ads','Website\AdsController@index')->name('ads.api');

//show website pages
Route::get('/' , 'Website\IndexController@index')->name('index');
Route::get('categories','Website\ProductController@showCategoryPage')->name('show.categories');
Route::get('products','Website\ProductController@showProductPage')->name('show.categories');
Route::get('products/{product}','Website\ProductController@showProduct')->name('show.product');
Route::resource('contacts','Website\ContactController');

// Cart
Route::get('cart/{id}' , 'CartController@addItem')->name('cart');
Route::get('cart-update' , 'CartController@updateItem')->name('cart.update');
Route::get('cart-delete' , 'CartController@delete')->name('cart.delete');
Route::get('cart-delete-all' , 'CartController@deleteAll')->name('cart.delete.all');
Route::get('get-cartItems' , 'CartController@cartItems')->name('cart.items');
Route::get('get-cartItem/{id}' , 'CartController@getItem')->name('cart.item');
Route::get('show-cartItem/{id}' , 'CartController@showCart')->name('show.cartItem');
Route::get('save-order' , 'CartController@saveOrder')->name('save.order');
Route::get('best-sels','Website\ProductController@bestSelling');

//
Route::get('test','CartController@saveOrder');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('signOut', 'Auth\LoginController@signOut');


Route::get('cart', function () {
  return view('cart');
});

Route::get('checkout', function () {
    return view('website.checkout');
});
