<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Message;
use App\Thread;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        // {{var_dump($id); }}
        $threads = DB::select("SELECT *
        FROM thread
       WHERE thread.owner_id = " . $id . "
       ORDER BY id"); //todo make this not raw query never
        return View::make('home')->with('threads', $threads);
    }

    public function create(Request $request)///used basic illumanate request
    {
       // {{dd($request);}}

        $id = Auth::id();
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->owner_id = $id; //short hand
        $thread->category_id = $request->category;

        $thread->save();     //dont forget this

        $getid = DB::getPdo()->lastInsertId();

       //{{dd($getid);}}

        $message = new Message();
        $message->id = $getid;
        $message->content = $request->content;
        $message->created_at = \Carbon\Carbon::now();
        $message->user_id = $id;

        $message->save();     //dont forget this

        return redirect('/home');
    }
}
