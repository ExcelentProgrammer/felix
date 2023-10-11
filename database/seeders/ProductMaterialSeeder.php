<?php

namespace Database\Seeders;

use App\Models\ProductMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductMaterial::create(["product_id" => 1, "material_id" => 1, "quantity" => 10]); // Ko'ylak  uchun ip
        ProductMaterial::create(["product_id" => 1, "material_id" => 2, "quantity" => 0.8]); // Ko'ylak uchun mato
        ProductMaterial::create(["product_id" => 1, "material_id" => 3, "quantity" => 5]); // Ko'ylak uchun tugma

        ProductMaterial::create(["product_id" => 2, "material_id" => 2, "quantity" => 1.4]); // Shim uchun Mato
        ProductMaterial::create(["product_id" => 2, "material_id" => 1, "quantity" => 15]); // Shim uchun Ip
        ProductMaterial::create(["product_id" => 2, "material_id" => 4, "quantity" => 1]); // Shim uchun zamok

    }
}
