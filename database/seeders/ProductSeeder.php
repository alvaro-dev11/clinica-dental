<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creando producto con su respectiva imagen
        $products=Product::factory(30)->create();

        foreach ($products as $product){
            Image::factory(1)->create([
                'imageable_id'=>$product->id,
                'imageable_type'=>Product::class
            ]);
        }
    }
}
