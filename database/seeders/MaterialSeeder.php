<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create(["name" => "Ip"]); // ID 0
        Material::create(["name" => "Mato"]); // ID 1
        Material::create(["name" => "Tugma"]); // ID 2
        Material::create(["name" => "Zamok"]); // ID 3
    }
}
