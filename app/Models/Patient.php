<?php

namespace App\Models;

use App\Models\Factura;
use App\Models\Historial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    // relacion de uno a muchos
    public function factura(){
        return $this->hasMany(Factura::class);
    }

    // relacion de uno a mucbos
    public function historial(){
        return $this->hasMany(Patient::class);
    }
}
