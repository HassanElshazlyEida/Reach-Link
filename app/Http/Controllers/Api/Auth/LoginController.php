<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Traits\GeneralApiTrait;
class LoginController extends Controller
{
    use GeneralApiTrait;
    public function login(Request $request)
    {

        if (!$request->password || $request->email) {
            return $this->errorField('Email or Password');
        }

        $user = User::where('email', $request->email)->first();
        if (!$user or !Hash::check($request->password, $user->password)) {
            return $this->errorMessage('Unauthorized');
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $data=[
            "token"             => $token,
            "userId"            => $user->id
        ];
        return $this->returnData('user', $data, __('Success login'));

    }

}
