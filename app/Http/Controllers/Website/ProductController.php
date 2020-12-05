<?php

namespace App\Http\Controllers\Website;

use App\Order;
use App\Mapping;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Traits\Mapping as Canvert;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;

class ProductController extends Controller
{
    use Canvert;
    public function index()
    {
        $products = Product::with('category')->latest('created_at')->get();
        $this->convert_to_map($products);
        return response()->json(['products' => $products]); 
    }

    public function lastProduct()
    {
        $products = Product::latest('created_at')->limit(8)->get();
        $this->convert_to_map($products);
        return response()->json(['products' => $products]);
    }

    public function category()
    {
        $categories = Category::latest('created_at')->get();
        $this->convert_to_map($categories);
        return response()->json(['categories' => $categories]);     
    }

    public function lastCategory()
    {
        $categories = Category::latest('created_at')->limit(3)->get();
        $this->convert_to_map($categories);
        return response()->json(['categories' => $categories]);     
    }


    public function showProductPage()
    {
        return view('website.products');
    }

    public function showCategoryPage()
    {
        return view('website.categories');
    }

    public function showContactPage()
    {
        return view('website.categories');
    }

    public function authuser()
    {
        if(\Auth::check()){
        $user = \Auth::user();
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar
        ];
        return response()->json(['user' =>$data ]);
       }
       return response()->json(['user' =>false ]); 
    }

}
