<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ApiAuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validator Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        //Generate Auth Token
        $success['token'] = $user->createToken("AuthToken")->accessToken;
        $success['account'] = $user;

        return $this->sendResponse($success, 'Account Created Successfully');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken("AuthToken")->accessToken;
            $success['user'] = $user;
            return $this->sendResponse($success, 'Your Logged In Successfully');
        } else {
            return $this->sendError('Unauthenticated', ['error' => 'Unauthorized..']);
        }
    }
}
