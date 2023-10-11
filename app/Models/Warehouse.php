<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(int[] $array)
 */
class Warehouse extends Model
{
    use HasFactory;

    public $fillable = [
        "material_id",
        "remainder",
        "price"
    ];

    function material(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Material::class, "material_id");
    }

}
