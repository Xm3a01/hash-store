<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($item){

            return [
                'name' => $item->name,
                'products' => $item->products->map(function($product){

                    return [
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'image' => $product->image
                    ];
                    
                 }),
            ];
        });
    }
}
