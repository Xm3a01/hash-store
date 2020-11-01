<?php

namespace App\Http\Controllers;


use Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cartItems()
    {
        if(Auth::check()){
            $userId = Auth::user()->id;
            return response()->json([
                'item' => Cart::session($userId)->getContent() , 
                'count' => Cart::session($userId)->getTotalQuantity() , 
                'total' => Cart::session($userId)->getTotal()
                ]);
          } else {
            return response()->json([
                'item' => Cart::getContent() , 
                'count' => Cart::getTotalQuantity() , 
                'total' => Cart::getTotal()
                ]);
          }
    }
    public function addItem($id)
    {
           $total = 0;
           $product = Product::findOrFail($id);
            if(Auth::check()){
            $userId = Auth::user()->id;
            $item =  Cart::session($userId)->add([
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
            ]);

            $total = Cart::session($userId)->getTotal();

            } else {
                $item = Cart::add([
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                ]);

                $total = Cart::getTotal();
            } 
            return response()->json([
                'item' => $item->getContent() , 
                'count' => $item->getTotalQuantity() , 
                'total' => $total
                ]);
        }


    public function updateItem(Request $request)
    {
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $item =  Cart::session($userId)->update($request->id , [
                'quantity' => $request->quantity,
            ]);
            return response()->json([
                'item' => Cart::session($userId)->getContent() , 
                'total' => Cart::session($userId)->getTotal()
                ]);
        } else {
            $item = Cart::update($request->id , array(
                'quantity' => $request->quantity,
            ));
            return response()->json([
                
                'item' => Cart::getContent() , 
                'total' => Cart::getTotal()
                ]);
        }

    }

    public function delete(Request $request)
    {

         if(Auth::check()) {
            $userId = Auth::user()->id;
            Cart::session($userId)->remove($request->id);
            return response()->json(['items' => Cart::session($userId)->getContent()]);
         } else {
             Cart::remove($request->id);
             return response()->json(['items' => Cart::getContent()]);
         }

    }


    public function deleteAll()
    {
        if(Auth::check()) {
            $userId = Auth::user()->id;
            Cart::session($userId)->clear();
            return response()->json(['items' => Cart::session($userId)->getContent()]);
    } else {
        Cart::clear();
        return response()->json(['items' => Cart::getContent()]);
    }

    return response()->json(['code' => 200]);
  }

  public function saveOrder()
  {
    if(Auth::check()) {
        $userId = Auth::user()->id;
      foreach (Cart::session($userId)->getContent() as $key => $cart) { //weltested letar
          Order::create([
            'name' =>$cart->name,
            'totalPrice' => $cart->price,
            'quantity' => $cart->quantity,
            'user_id' => $userId
         ]);
      }
    }
  }
}
