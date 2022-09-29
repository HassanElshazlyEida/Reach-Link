<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class TagFormRequest extends BaseFormRequest
{


    public function rules()
    {
        return [
            'title'              => 'required|string|max:255',
            'ad_id'              => 'required|integer|exists:ads,id',
        ];
    }

}
