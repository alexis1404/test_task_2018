<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Illuminate\Http\Request;
use App\Mail\CheckAccount;
use Illuminate\Support\Facades\Mail;
use Activation;
use Sentinel;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('layouts.register_page');
    }

    public function registerForm(Request $request)
    {
        $credentials = [
            'email'    => $request->inputEmail,
            'password' => $request->inputPassword,
            'first_name' => $request->inputName,
            'last_name' => $request->inputLastName
        ];

        if($credentials){

            $new_user = Sentinel::register($credentials);

            Mail::to($new_user)->send(new CheckAccount($new_user));

            return redirect('/');
        }
    }

    public function checkAccount($id)
    {
        $user = Sentinel::findById($id);

        $activation = Activation::create($user);

        if(Activation::complete($user, $activation->getCode())){

            $message = 'Your account activated!';

            return view('layouts.welcome', compact('message'));
        }

    }

    public function authPage()
    {
        return view('layouts.auth_page');
    }

    public function authForm(Request $request)
    {
        $credentials = [
            'email'    => $request->inputEmail,
            'password' => $request->inputPassword,
        ];

        try{
            Sentinel::authenticate($credentials);

        }catch (NotActivatedException $e){
            $message = 'Sorry, your account not activated! Check your email!';
            return view('layouts.auth_page', compact('message'));
        }

        if(Sentinel::authenticate($credentials)){

            return redirect('/');

        }else{

            $message = 'Sorry, authentication is invalid! Input your data once again, or register now';

            return view('layouts.auth_page', compact('message'));
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/');
    }
}
