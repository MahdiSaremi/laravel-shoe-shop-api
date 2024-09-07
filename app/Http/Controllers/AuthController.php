<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate(['test' => 'required']);

        return ['status' => "OK"];
    }

    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }

}
