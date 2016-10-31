<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [
    'as' => 'adminLogin',
    'uses' => 'AdminLoginController@loginPage'
]);

Route::post('/admin', [
    'uses' => 'AdminLoginController@postLogin'
]);

Route::get('/logout', [
    'as' => 'adminLogOut',
    'uses' => 'AdminLoginController@logOut'
]);

Route::get('/adminhome', [
    'as' => 'adminHome',
    'uses' => 'AdminHomeController@index'
]);

Route::post('/filminsert', [
    'as' => 'filmInsert',
    'uses' => 'AdminHomeController@insert'
]);

