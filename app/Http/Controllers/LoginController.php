<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) //if this method returns true =>
            {
                $user = User::where('email', $request->email)->first();
                if ($user->is_admin()) {
                        Session::put('admin', true); //user is admin, put into session
                        return redirect()->route('dashboard');
                    }
                    //not admin, go home
                return redirect()->route('home');
            }

        return redirect()->back;
    }
}
