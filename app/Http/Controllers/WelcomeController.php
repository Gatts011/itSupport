<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    public function index()
    {
        $threads = DB::table('thread')->get();
        return View::make('welcome')->with('threads', $threads);
        // $threads = DB::table('thread')->get();

        // foreach ($threads as $thread)
        // {
        //     var_dump($thread->title);
        // }

    }
}
