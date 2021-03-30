<?php

namespace App;

use App\Image;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function products()
    {
        return $this->hasOne(Product::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
