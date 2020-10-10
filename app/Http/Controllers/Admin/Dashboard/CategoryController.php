<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        return $category;
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
