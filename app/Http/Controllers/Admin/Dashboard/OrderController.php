<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::all();

        return view('admins.dashboard.orders.index' , ['orders' => $orders]);
    }

    
    public function create()
    {
        return view('admins.dashboard.orders.create');
    }

    
    public function store(OrderRequest $request)
    {
        $order = Order::create([
            'name' => $request->name,
            'totalPrice' => $request->totalPrice,
            'quantity' => $request->quantity,
            'user_id' => $request->user_id,
        ]);

        return $order;
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(OrderRequest $request, Order $order)
    {
        $order->update([
            'name' => $request->name,
            'totalPrice' => $request->totalPrice,
            'quantity' => $request->quantity,
        ]);
    }

    
    public function destroy(Order $order)
    {
        $order->delete();
    }
}
