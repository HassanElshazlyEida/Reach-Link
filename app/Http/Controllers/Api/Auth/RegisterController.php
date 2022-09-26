<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        if (!$request->password || $request->email) {
            return $this->errorField('Email or Password');
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->returnFailData('email_address_exist', true, __('This Email address is  used before'));
        }

        $validator  = $this->Validator($request, User::rules(true));
        if ($validator->fails()) {
            return $this->ValidatorMessages($validator->errors()->getMessages());
        }

        $user = User::create(User::credentials($request, true));
        $token = $user->createToken('my-app-token')->plainTextToken;
        $data = [
            "token"             => $token,
            "userId"            => $user->id
        ];

        return $this->returnData('user', $data, __('User has been created successfully'));
    }
}
