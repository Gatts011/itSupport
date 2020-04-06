<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function index($id){
        //get thread messages with id

       $messages = DB::select("SELECT users.name, messages.content, messages.created_at, thread.title
       FROM messages
       JOIN users on users.id  = messages.user_id
       JOIN thread on thread.id  = messages.id
       WHERE thread.id = ".$id."
       ORDER BY created_at"); //todo make this not raw query never

        return View::make('ticket')->with('messages', $messages);
    }
}
