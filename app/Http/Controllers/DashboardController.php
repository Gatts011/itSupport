<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {

        if (Session::get('admin')){ //are we admin?
            return view('dashboard');
        }

        abort(404);//we are not admin, cant go here
    }


}
