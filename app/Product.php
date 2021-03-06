<?php

namespace App;

use App\Image;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
