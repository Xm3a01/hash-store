<?php

namespace App\Http\Controllers\Website;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Product::first();
        if(Auth::check()) {
            $user = Auth::user()->name;
        }
        return view('website.index' ,['user' => $user ?? '' ]);
    }
}
