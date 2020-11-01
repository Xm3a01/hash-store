<?php

namespace App\Http\Controllers\Website;

use App\Order;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $categories = Category::all();
        return new CategoryCollection($categories);
    }

    public function lastProduct()
    {
        $products = Product::latest('created_at')->limit(6)->get();

        $products->map(function($product) {
            return $product['image'] = $product->image;
        });
        return response()->json(['products' => $products]);
    }
}
