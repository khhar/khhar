<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allVotings = 0;
        $allFilms = DB::table('films')->select()->get();
        foreach($allFilms as $v) {
            $allVotings = $allVotings + $v->votes;
        }
        if($allVotings != 0){
            foreach($allFilms as &$v) {
                $per = round($v->votes*100/$allVotings, 2).'%';
                $v->per = $per;
            }
        }
        return view('welcome', ['allFilms' => $allFilms]);
    }
    public function voteFilm(Request $request){
        if( $request->ajax() ) {
            $allVotings = 0;
            $perArray = [];
            $film_id = $request->input('ajax_film_id');
            DB::update("update films set votes = votes+1 where id = '$film_id'");
            //DB::table('films')->where('id', $film_id)->update(['votes' => '++1']);
            $allFilms = DB::table('films')->select()->get();
            if(empty($allFilms)){
                echo 'error';
            }
            else {
                foreach($allFilms as $v) {
                    $allVotings = $allVotings + $v->votes;
                }
                foreach($allFilms as $v) {
                    $per = round($v->votes*100/$allVotings, 2).'%';
                    array_push($perArray, $per);
                }
                return Response::json($perArray);
            }
        }
    }

    /**
     * @return string
     */
    public function films()
    {
        $films = DB::table('films')->select()->get();
        return view('films', ['films' => $films]);
    }
}
