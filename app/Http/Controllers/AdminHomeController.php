<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        if (Auth::guest()){
            return Redirect::route('adminLogin');
        }
        $films = DB::table('films')->select()->get();

        return view('admin.adminHome', ['films' => $films]);
    }
    public function insert(){
        $rules = array('film' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::route('adminHome')->withErrors($validator);
        }
        $insert = DB::table('films')->insert(
            ['film_name' => Input::get('film'), 'votes' => 0]
        );
        if (! $insert){
            return Redirect::route('adminHome')->withErrors('error insert');
        }
        return Redirect::route('adminHome');

    }
}
