<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ProductHelper;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductMaterialResource;
use App\Http\Resources\WarehouseResource;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Response;
use LDAP\Result;

class BaseController extends Controller
{
    function index(ProductRequest $request): \Illuminate\Http\JsonResponse
    {

        $products = json_decode($request->input("products"));

        $ProductMaterials = ProductMaterialResource::collection(ProductMaterial::all());
        $Warehouses = WarehouseResource::collection(Warehouse::all()->values()); // Ombordagi maxsulotlar (array)


        $TotalMaterials = []; // Jami kerakli maxsulotlar

        foreach ($products as $item) {
            $product = Product::where(['code' => $item->code]); // maxsulot
            
            if (!$product->exists()) continue; // Agar Maxsulot topilmasa keyingi maxsulotga o'tib ketadi

            $product = $product->get()->first();

            $materials = $ProductMaterials->filter(function ($i) use ($item) {
                return $i->product->code == $item->code;
            }); // Maxsulotga tegishli materiallerni filter qilish uchun

            $TotalMaterials[$product->name] = ProductHelper::getTotalMaterials($materials, $item->count); // Barcha maxsulotlarga ketadigan materialler
        }

        $response = ProductHelper::getProductsMaterials($TotalMaterials, $Warehouses); // Maxsulotlarga ketadigan barcha materillarni xisoblab berish uchun

        return Response::json($response);
    }
}


