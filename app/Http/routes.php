<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get("/","myResourceController@index");

Route::get("/show/{name}","myResourceController@show");


//Route::auth();

Route::get('login', '\App\Http\Controllers\Auth\AuthController@showLoginForm');
Route::post('login', '\App\Http\Controllers\Auth\AuthController@login');
Route::get('logout', '\App\Http\Controllers\Auth\AuthController@logout');

Route::get('register', '\App\Http\Controllers\Auth\AuthController@showRegistrationForm');
Route::post('register', '\App\Http\Controllers\Auth\AuthController@register');

Route::get('password/reset/{token?}', '\App\Http\Controllers\Auth\PasswordController@showResetForm');
Route::post('password/email', '\App\Http\Controllers\Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', '\App\Http\Controllers\Auth\PasswordController@reset');

Route::get('/home', 'HomeController@index');
