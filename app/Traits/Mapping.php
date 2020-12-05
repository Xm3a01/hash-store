<?php

namespace App\Traits;


trait Mapping
{
    public function convert_to_map($collection)
    {
        $collection->map(function($convert) {
            return $convert['image'] = $convert->image;
        });
    }
}