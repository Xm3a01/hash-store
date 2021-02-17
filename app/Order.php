<?php

namespace App;

use App\User;
use App\Product;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'totalPrice' ,
        'quantity' ,
        'user_id',
        'product_id',
        'address',
        'phone',
        'office_address',
        'delivery_time',
        'office_delivery_time'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
