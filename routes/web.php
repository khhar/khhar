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

Route::get('/', [
    'as' => 'welcome',
    'uses' => 'HomeController@index'
]);

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

Route::post('/editFilm', [
    'as' => 'editFilm',
    'uses' => 'AdminHomeController@editFilm'
]);

Route::post('/deleteFilm', [
    'as' => 'deleteFilm',
    'uses' => 'AdminHomeController@deleteFilm'
]);

Route::post('/voteFilm', [
    'as' => 'voteFilm',
    'uses' => 'HomeController@voteFilm'
]);

Route::get('/films', [
    'as' => 'films',
    'uses' => 'HomeController@films'
]);
