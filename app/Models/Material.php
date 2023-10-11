<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Material extends Model
{
    use HasFactory;

    public $fillable = [
        "name"
    ];
}
