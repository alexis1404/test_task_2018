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

//check mail account route
Route::get('check_mail/{id}', 'AuthController@checkAccount')->name('checkAccount');

//user private room controllers
Route::group(['middleware' => 'checker'], function () {

    Route::get('private_room', 'UserController@getUserPage')->name('userPage');
    Route::get('get_user', 'UserController@getUser')->name('getUser');
    Route::post('edit_user/{id}', 'UserController@editUser')->name('editUser');


});

//logout
Route::get('logout', 'AuthController@logout')->name('logout');

