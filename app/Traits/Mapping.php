<?php

namespace App\Traits;


trait Mapping
{
    public $images = [];
    
    public function convert_to_map($collection)
    {
        $collection->map(function($convert) {
            return $convert['image'] = $convert->getMedia('products');
        });
    }

    public function addMultiImage($collection)
    {
        $collection->map(function($convert) {
            foreach ($convert->getMedia('products') as $key=>$item) {
                $images[$key] = $item->getUrl(); 
            }

            return $convert['images'] = $images;
        });
    }

    public function convert_relation($orders)
    {
        $orders->map(function ($order) {
            $order->product['image'] = $order->product->getMedia('products');
        });
    }
}