<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(int[] $array)
 */
class ProductMaterial extends Model
{
    use HasFactory;


    public $fillable = [
        "product_id",
        "material_id",
        "quantity"
    ];

    function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class,"product_id");
    }

    function material(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
