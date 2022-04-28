<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use Str;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function success()
    {
        return view('success');
    }

    function checkLogin(Request $request)
    {

        //validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:5',
        ]);

        // Authentication
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::attempt($user_data)) {
            return redirect('success');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
