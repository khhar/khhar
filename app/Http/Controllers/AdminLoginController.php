<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function loginPage(){
        return view('admin.adminLogin');
    }
    public function  postLogin(){
        $rules = array('email' => 'required', 'password' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::route('adminLogin')->withErrors($validator);
        }
        $auth = Auth::attempt(array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'role' => 'admin',
        ), false);
        if (! $auth){
            return Redirect::route('adminLogin')->withErrors('error login');
        }
        return Redirect::route('adminHome');
    }
    public function logOut()
    {
        Auth::logout();
        return Redirect::route('adminLogin');
    }
}
