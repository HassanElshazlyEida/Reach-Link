<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

trait failedValidationTrait {

       /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
}
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['error' => $validator->errors()->first(),'status'=>false], 422);
        throw new ValidationException($validator, $response);
    }
}
