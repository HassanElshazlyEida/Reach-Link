<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class CategoryFormRequest extends BaseFormRequest
{


    public function rules()
    {
        return [
            'name'              => 'required|string|max:255',
            'content'           => 'required|min:3',
        ];
    }

}
