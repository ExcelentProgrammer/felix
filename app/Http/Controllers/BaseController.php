<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ProductHelper;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductMaterialResource;
use App\Http\Resources\WarehouseResource;
use App\Models\ProductMaterial;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Response;

class BaseController extends Controller
{
    function index(ProductRequest $request): \Illuminate\Http\JsonResponse
    {

        $dress = (int)$request->post("dress", 0); // Nechta Ko'ylak kerak ekanligi
        $pants = (int)$request->post("pants", 0); // Nechta Shim kerak ekanligi

        $ProductMaterials = ProductMaterialResource::collection(ProductMaterial::all());
        $Warehouses = WarehouseResource::collection(Warehouse::all()->values()); // Ombordagi maxsulotlar (array)


        $DressMaterials = $ProductMaterials->filter(function ($item) {
            return $item->product->code == 1;
        });  // Ko'ylak uchun kerakli materiallar

        $PantsMaterials = $ProductMaterials->filter(function ($item) {
            return $item->product->code == 2;
        }); // Shim uchun kerakli materiallar


        $TotalMaterials = [
            "Ko'ylak" => ProductHelper::getTotalMaterials($DressMaterials, $dress),
            "Shim" => ProductHelper::getTotalMaterials($PantsMaterials, $pants),
        ]; // Jami kerakli maxsulotlar

        $response = ProductHelper::getProductsMaterials($TotalMaterials, $Warehouses); // Maxsulotlarga ketadigan barcha materillarni xisoblab berish uchun

        return Response::json($response);
    }
}
