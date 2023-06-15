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

    protected $fillable=['name','slug','description','status','image','category_id','proveedor_id'];

    // relacion de uno a muchos inversa
    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    // public function proveedor(){
    //     return $this->belongsTo(Proveedor::class);
    // }
    public function proveedor(){
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }
}
