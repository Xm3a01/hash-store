<?php

namespace App\Http\Controllers;


use App\OrderDetail;
use Cart;
use App\Order;
use App\Product;
use App\Traits\Mapping;
use Illuminate\Http\Request;
use App\Traits\ProductAmount;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use Mapping , ProductAmount;

    public function cartItems()
    {
        if(Auth::check()){
            $userId = Auth::user()->id;
            return response()->json([
                'item' => Cart::session($userId)->getContent() ,
                'count' => Cart::session($userId)->getContent()->count() ,
                'total' => Cart::session($userId)->getTotal()
                ]);
          } else {
            return response()->json([
                'item' => Cart::getContent() ,
                'count' => Cart::getContent()->count() ,
                'total' => Cart::getTotal()
                ]);
          }
    }
    public function addItem($id)
    {
           $total = 0;
           $images = [];
           $product = Product::findOrFail($id);
        //    $this->convert_to_map($product);

              foreach ($product->getMedia('products') as $key=>$item) {
                $images[$key] = $item->getUrl();
             }

             $product['images'] = $images;

            if(Auth::check()){
            $userId = Auth::user()->id;
            $item =  Cart::session($userId)->add([
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'associatedModel' => $product
            ]);

            $total = Cart::session($userId)->getTotal();

            } else {
                $item = Cart::add([
                    'id' => $id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'associatedModel' => $product
                ]);

                $total = Cart::getTotal();
            }
            return response()->json([
                'item' => $item->getContent() ,
                'count' => Cart::getContent()->count(),
                'total' => $total
                ]);
        }


    public function updateItem(Request $request)
    {
        $item = Cart::get($request->id);
        if(!is_null($item)){
          if(Auth::check()) {
              $userId = Auth::user()->id;
              // Cart::get($request->id)->quantity;
              $item =  Cart::session($userId)->update($request->id , [
                  'quantity' => array(
                      'relative' => false,
                      'value' => $request->quantity
                  ),
              ]);
              return response()->json([
                  'item' => $item ,
                  'total' => Cart::session($userId)->getTotal(),
                  'count' => Cart::getContent()->count(),
                  ]);
          } else {
              $item = Cart::update($request->id , array(
                  'quantity' => array(
                      'relative' => false,
                      'value' => $request->quantity
                  ),
              ));
              return response()->json([

                  'item' => $item ,
                  'count' => Cart::getContent()->count(),
                  'quantity' => Cart::get($request->id)->quantity
                  ]);
          }
        } else {
          $this->addItem($request->id);
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

  public function saveOrder(Request  $request)
  {
    if(Auth::check()) {
        $userId = Auth::user()->id;
        $order = Order::create([
            'totalPrice' => Cart::getTotal(),
            'user_id' => $userId,
            'address' => $request->address,
            'phone' => $request->phone,
            'office_address' => $request->office_address,
            'delivery_time' => $request->delivery_time,
            'office_delivery_time' => $request->office_delivery_time
        ]);
      foreach (Cart::session($userId)->getContent() as $key => $cart) { //weltested letar
        $this->amount($cart->id , $cart->quantity);
          OrderDetail::create([
            'price' => $cart->price,
            'quantity' => $cart->quantity,
            'product_id' => $cart->id,
            'order_id' => $order->id
         ]);
      }
      Cart::session($userId)->clear();
    } else {
        $order = Order::create([
            'totalPrice' => Cart::getTotal(),
            'address' => $request->address,
            'phone' => $request->phone,
            'office_address' => $request->office_address,
            'delivery_time' => $request->delivery_time,
            'office_delivery_time' => $request->office_delivery_time
        ]);
      foreach (Cart::getContent() as $key => $cart) { //weltested letar
        $this->amount($cart->id , $cart->quantity);
          OrderDetail::create([
              'price' => $cart->price,
              'quantity' => $cart->quantity,
              'product_id' => $cart->id,
              'order_id' => $order->id
          ]);
      }
      Cart::clear();
      return view('website.success');
    }

  }

  public function getItem($id)
  {

    if(Auth::check()) {
        $userId = Auth::user()->id;
       $item = Cart::session($userId)->get($id);
     } else {
        $item = Cart::get($id);
     }

     return  view('cart' , ['item' => $item]);
  }

  public function showCart($id)
  {
    if(Auth::check()) {
      $userId = Auth::user()->id;
      $item = Cart::session($userId)->get($id);
    } else {
      $item = Cart::get($id);
    }
    // return $item;
      return view('website.cart' , ['item' => $item]);
    // return $item->associatedModel;
  }

}
