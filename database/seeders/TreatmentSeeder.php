<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Treatment::create([
            'name'=>'ESTÉTICA Y DISEÑO DE SONRISAS',
            'price'=>120
        ]);
        Treatment::create([
            'name'=>'REHABILITACIÓN ORAL',
            'price'=>130
        ]);
        Treatment::create([
            'name'=>'ORTODONCIA',
            'price'=>150
        ]);
        Treatment::create([
            'name'=>'PERIODONCIA',
            'price'=>160
        ]);
        Treatment::create([
            'name'=>'ENDODONCIA',
            'price'=>200
        ]);
        Treatment::create([
            'name'=>'CIRUGÍA MAXILOFACIAL',
            'price'=>300
        ]);

    }
}
