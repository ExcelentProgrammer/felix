<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return mixed
     * Request validatsiyadan o'tmaganda json error qaytarish uchun
     */
    protected function failedValidation(Validator $validator): mixed
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation error',
            'errors' => $errors,
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dress" => ["int"],
            "pants" => ["int"]
        ];
    }
}
