<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sentinel;
use App\User;

class UserController extends Controller
{
    public function getUserPage()
    {
        return view('layouts.private_room');
    }

    public function getUser()
    {
        return new JsonResponse(User::find(Sentinel::check()->id));
    }

    public function editUser($id, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'sometimes|max:100',
            'last_name' => 'sometimes|max:100',
            'email' => 'sometimes|email',
            'password' => 'sometimes|max:50'
        ]);

        $user = Sentinel::findById($id);
        $credentials = [];

        if(isset($request->first_name) && $request->first_name != ''){
            $credentials['first_name'] = $request->first_name;
        }

        if(isset($request->last_name) && $request->last_name != ''){
            $credentials['last_name'] = $request->last_name;
        }

        if(isset($request->email) && $request->email != ''){
            $credentials['email'] = $request->email;
        }

        if(isset($request->password) && $request->password != ''){
            $credentials['password'] = $request->password;
        }

        Sentinel::update($user, $credentials);

        return response('1', 200);
    }
}
