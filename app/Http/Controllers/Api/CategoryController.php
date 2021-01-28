<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $modelCategories = new CategoryCollection($categories);
        return response()->json(['categories' => $modelCategories , 'code' => 200]);
    }
}
