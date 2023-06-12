<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Image;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // relacion de uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    // relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
