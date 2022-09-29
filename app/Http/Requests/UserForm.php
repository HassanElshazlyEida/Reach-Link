<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;


class UserForm extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|max:255|unique:users,email',
            'password'          => 'required|string|min:8'
        ];
    }

}
