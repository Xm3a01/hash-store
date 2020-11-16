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
        $this->validate($request , [
            'name' => 'required',
            'description' => 'required',
        ]);
        $category = Category::create($request->all());
            
            if($request->hasFile('image')) {
             $category->addMedia($request->image)->preservingOriginal()->toMediaCollection('categories');
        }

        return redirect()->route('categories.index');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(Category $category)
    {
        return view('admins.dashboard.categories.edit' , ['category' => $category]);
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        if($request->hasFile('image')) {
            $category->clearMediaCollection('categories');
            $category->addMedia($request->image)->preservingOriginal()->toMediaCollection('categories');
       }

       return redirect()->route('categories.index');
    }

   
    public function destroy(Category $category)
    {
        $category->clearMediaCollection('categories');
        $category->delete();
       return redirect()->route('categories.index');

    }
}
