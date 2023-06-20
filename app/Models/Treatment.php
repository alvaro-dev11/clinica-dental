<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

     // relacion de uno a muchos
     public function historial(){
        return $this->hasMany(Treatment::class);
    }
}
