<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Product extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "code"
    ];

    function materials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductMaterial::class, "product_id");
    }
}
