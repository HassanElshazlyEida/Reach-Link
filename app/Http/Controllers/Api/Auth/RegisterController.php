<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Traits\GeneralApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserForm;

class RegisterController extends Controller
{
    use GeneralApiTrait;
    public function register(UserForm $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->returnError( __('This Email address is used before'));
        }
        $validated=$request->validated();
        $validated['password']=bcrypt($request->password);

        $user = User::create($validated);
        $token = $user->createToken('my-app-token')->plainTextToken;
        $data = [
            "token"             => $token,
            "userId"            => $user->id
        ];

        return $this->returnData('user', $data, __('User has been created successfully'));
    }
}
