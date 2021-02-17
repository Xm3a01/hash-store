<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::all();

        return view('admins.dashboard.orders.index' , ['orders' => $orders]);
    }

    
    public function create()
    {

        $users = User::all();
        return view('admins.dashboard.orders.create' , ['users' => $users]);
    }

    
    public function store(OrderRequest $request)
    {
        $data = $request->all();
        $data['totalPrice'] = $request->price * $request->quantity;
         
        $order = Order::create($data);

        \Session::flash('success' , 'تم حفظ الطلب بنجاح');
        return redirect()->route('orders.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Order $order)
    {
        $users = User::all();
        return view('admins.dashboard.orders.edit' , [
            'order' => $order,
            'users' => $users
            ]);
    }

    
    public function update(OrderRequest $request, Order $order)
    {
        $data = $request->all();
        $data['totalPrice'] = $request->price * $request->quantity;
        
        $order->update($data);

        \Session::flash('success' , 'تم تعديل الطلب بنجاح');
        return redirect()->route('orders.index');
    }

    
    public function destroy(Order $order)
    {
        $order->delete();

        \Session::flash('success' , 'تم حذف الطلب بنجاح');
        return redirect()->route('orders.index');
    }

    public function orderDetails(Order $order)
    {
        return view('admins.dashboard.orders.order_details' , ['orders' => $order->order_details]);
    }
}
