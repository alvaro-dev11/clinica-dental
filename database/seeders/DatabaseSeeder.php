<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Historial;
use App\Models\Product;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);

        // Storage::deleteDirectory('posts');
        // creando la carpeta products en la carpeta storage
        Storage::makeDirectory('products');

        // creando datos falsos
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Proveedor::factory(4)->create();
        Historial::factory(4)->create();
        $this->call(ProductSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
