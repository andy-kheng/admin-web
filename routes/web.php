<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.login');
});
Route::post('/login' , array('as' =>'post-login' , 'uses' => 'AdminController@postLogin'));
Route::get('/dashboard' , array('as' =>'dashboard' , 'uses' => 'AdminController@dashboard'));
Route::get('/test' , array('as' =>'test' , 'uses' => 'AdminController@test'));
