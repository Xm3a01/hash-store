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
        return view('admins.dashboard.categories.index' , ['categories' => $categories]);
    }


    public function create()
    {
        return view('admins.dashboard.categories.create');
    }

   
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
            ]);
            
            if($request->hasFile('image')) {
             $category->addMedia($request->image)->preservingOriginal()->toMediaCollection('categories');
        }

        return redirect()->route('categories.index');
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
