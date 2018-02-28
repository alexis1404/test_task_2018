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
    return view('layouts.welcome');
});

//register routes
Route::get('register_page', 'AuthController@registerPage')->name('registerPage');
Route::post('register', 'AuthController@registerForm')->name('registerForm');

//authorization routes
Route::get('auth_page', 'AuthController@authPage')->name('authPage');
Route::post('auth_form', 'AuthController@authForm')->name('authForm');


Route::get('check_mail/{id}', 'AuthController@checkAccount')->name('checkAccount');

//logout
Route::get('logout', 'AuthController@logout')->name('logout');

