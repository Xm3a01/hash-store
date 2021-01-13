<?php

namespace App\Http\Controllers\Website;

use App\Ads;

use App\Product;
use App\Traits\Mapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
   use Mapping;

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
        $ads = Ads::latest('updated_at')->get();
        $this->convert_to_map($ads);
        return view('website.index' ,[
            'user' => $user ?? '',
            'ads' => $ads
            ]);
    }
}
