<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    // function  of login
    public function checkLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $response = [];

        if(auth()->attempt($request->all())) {
            $response['status'] = 'success';
            $response['message'] = 'Logged in successfully';
            $response['data'] = auth()->user();
        }
        else {
            $response['status'] = 'fail';
            $response['message'] = 'Invalid password';
            $response['data'] = [];
            
        }

        return $response;
    }


// function of register
    public function checkregister(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        

        $user = User::create([
           'name'=>$name,
           'email'=>$email,
           'password'=>\Hash::make($password),
        ]);
        $response = [];

        if($user) {
            $response['status'] = 'success';
            $response['message'] = 'registered successfully';
            $response['data'] = $user;
        }
        else {
            $response['status'] = 'fail';
            $response['message'] = 'Invalid register';
            $response['data'] = [];
        }

        return $response;
    }
}
