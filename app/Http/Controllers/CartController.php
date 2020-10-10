<?php

namespace App\Http\Controllers;


use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItem($id)
    {
        if($id < 0){
            $id +=1;
        }
        if(Auth::check()){
         $userId = Auth::user()->id;
          $item =  Cart::session($userId)->add([
                'id' => $id,
                'name' => 'Sample Item 2',
                'price' => 69.25,
                'quantity' => 1,
          ]);

              return response()->json(['item' => $item->getContent() , 'count' => $item->getTotalQuantity()]);
        } else {
            $item = Cart::add([
                'id' => $id,
                'name' => 'Sample Item 2',
                'price' => 69.25,
                'quantity' => 1,
            ]);
            return response()->json(['item' => $item->getContent() , 'count' => $item->getTotalQuantity()]);
        }
        
    }


    public function updateItem()
    {
        # code...
    }
}
