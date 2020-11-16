<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        // return $products->map(function($product){
        //     $product['image'] = $product->image;
        // });
        return view('admins.dashboard.products.index' , ['products' => $products]);
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('admins.dashboard.products.create' , ['categories' => $categories]);
    }

   
    public function store(Request $request)
    {
        $this->validate($request , [
            'name',
            'description',
            'price',
            'category_id',
            'availableSize',
            'disCount',
            'productAvailable',
            'unitPrice',
            'unitOnOrder',
        ]);

        $product = Product::create($request->all());
            
            if($request->hasFile('image')) {
                $product->addMedia($request->image)->preservingOriginal()->toMediaCollection('products');
            }
        return redirect()->route('products.index');
    }

   
    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admins.dashboard.products.edit' , [
            'product' => $product,
            'categories' =>  $categories
            ]);
    }

   
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        if ($request->hasFile('image')) {
            $product->clearMediaCollection('products');
            $product->addMedia($request->image)->preservingOriginal()->toMediaCollection('products');
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->clearMediaCollection('products');
        $product->delete();
        return \redirect()->route('products.index');
    }
}
