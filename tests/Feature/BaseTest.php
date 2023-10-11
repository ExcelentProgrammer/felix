<?php

namespace Tests\Feature;

use Tests\TestCase;

class BaseTest extends TestCase
{
    /**
     * Response status test
     */
    public function test_info(): void
    {
        $response = $this->post('api/info/', [
            "dress" => 30,
            "pants" => 20,
        ]);
        $response->assertStatus(200);
    }


    /**
     * Response json structure test
     */
    public function test_json_structure()
    {

        $response = $this->post('api/info/', [
            "dress" => 30,
            "pants" => 20,
        ]);

        $response->assertJsonIsArray(); // Is Array
        $response->assertJsonStructure([
            "*" => [
                "product_name",
                "product_qty",
                "product_materials" => [
                    [
                        "warehouse_id",
                        "material_name",
                        "qty",
                        "price"
                    ]
                ]
            ]
        ]); // Json Structure test
    }


    /**
     * Response json is array test
     */
    public function test_is_array()
    {
        $response = $this->post('api/info/', [
            "dress" => 30,
            "pants" => 20,
        ]);
        $response->assertJsonIsArray(); // Is Array
    }


    /**
     * Response json in values test
     */
    public function test_json()
    {
        $response = $this->post('api/info/', [
            "dress" => 30,
            "pants" => 20,
        ]);
        $response->assertJson([
            [
                "product_name" => "Ko'ylak",
                "product_qty" => 30
            ],
            [
                "product_name" => "Shim",
                "product_qty" => 20
            ]
        ]); // Maxsulot nomi va soni to'g'ri ekanligini tekshirish
    }
}
