<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $totalPayment = "";

        if (Auth::guard('admin')->user()->is_supervisor) {
            $amount = Auth::guard('admin')->user()->products->sum('productAmount');
            $fixed =  Auth::guard('admin')->user()->products->sum('fiexdAmount');
            $totalPayment = $fixed - $amount;
        }
        return view('admins.dashboard.index' , ['totalPayment' => $totalPayment]);
    }
}
