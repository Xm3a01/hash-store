<?php

namespace App;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ads extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title' , 'description'];


    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('ads');
    }
}
