<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Log;
use Response;

class ProductsRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    static function error($message){
        throw new HttpResponseException(Response::json([
            "success"=>false,
            "message"=>$message
        ]));
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = json_decode($value,true);
        if (!is_array($value)) {
            self::error("The list of products must be an array");
        }


        foreach ($value as $item) {
            if (!is_array($item) || !isset($item['code']) || !isset($item['count'])) {
                self::error("Array contains code and count");
            }
        }
    
    }
}
