<?php

namespace App\Http\Controllers\Website;

use App\Ads;
use App\Traits\Mapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    use Mapping;

    public function index()
    {
        $ads = Ads::latest()->first()->get();
        $this->convert_to_map($ads);
        return view('website.index' , ['ads' => $ads]);
    }
}
