<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\failedValidationTrait;

abstract class BaseFormRequest extends FormRequest
{

    use failedValidationTrait;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

}
