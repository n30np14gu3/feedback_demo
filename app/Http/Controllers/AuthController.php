<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request  $request){
        if(Auth::check())
            return redirect('/');

        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ], [
            'username.required' => 'Username is empty!',
            'username.exists' => 'User is not exist!',
            'password.required' => 'Password is empty!'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            return $this->response;
        }

        if(!Auth::attempt($request->only('username', 'password'))){
            $this->response['message'] = 'Invalid username or password!';
            return  $this->response;
        }

        $this->response['status'] = 'OK';
        return $this->response;
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
