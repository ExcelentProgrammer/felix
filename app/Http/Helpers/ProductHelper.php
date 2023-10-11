<?php


namespace App\Http\Helpers;


class ProductHelper
{

    /**
     * @author Azamov Samandar
     * Maxsulotga ketadigan materiallarni hisoblab bekrish uchun
     */
    static public function getTotalMaterials($TotalMaterials, $count): array
    {
        $materials = [];
        for ($i = 1; $i <= $count; $i++) {
            foreach ($TotalMaterials as $item) {
                !isset($materials[$item['material']['name']]) ? $materials[$item->material->name] = $item->quantity : $materials[$item->material->name] += $item->quantity;
            }
        }
        return [
            "result" => $materials,
            "count" => $count
        ];
    }

    /**
     * @author A'zamov Samandar
     *  Maxsulotlarga ketadigan barcha materillarni xisoblab beradi
     */
    static function getProductsMaterials(array $TotalMaterials, object $Warehouses)
    {
        foreach ($TotalMaterials as $product_name => $materials) {

            $product_materials = []; // Bitta maxsulotga kerakli materiallarni saqlash uchun

            foreach ($materials['result'] as $material_name => $material_count) {

                foreach ($Warehouses as $Warehouse) {
                    if ($Warehouse->material->name == $material_name and $Warehouse->remainder != 0) {
                        $qty = 0; // maxsulot bitta partiyadan qancha material olganini 

                        if ($Warehouse->remainder >= $material_count) {
                            $Warehouse->remainder -= $material_count;
                            $qty = $material_count;
                            $material_count = 0;
                        } else {
                            $qty = $Warehouse->remainder;
                            $material_count -= $Warehouse->remainder;
                            $Warehouse->remainder = 0;
                        }
                        $product_materials[] = [
                            "warehouse_id" => $Warehouse->id,
                            "material_name" => $material_name,
                            "qty" => (int) number_format($qty, 0),
                            "price" => $Warehouse->price
                        ];

                        if ($material_count == 0) break;
                    }
                }
                if ($material_count != 0) {
                    $product_materials[] = [
                        "warehouse_id" => null,
                        "material_name" => $material_name,
                        "qty" => (int) $material_count,
                        "price" => null
                    ];
                }
            }
            $response[] = [
                "product_name" => $product_name,
                "product_qty" => $materials['count'],
                "product_materials" => $product_materials,
            ];
        }
        return $response;
    }
}
