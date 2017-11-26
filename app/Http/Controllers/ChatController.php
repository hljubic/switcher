<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\Participant;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.index')
            ->with('conversations', Conversation::whereHas('participants', function ($q) {
                $q->where('user_id', '=', Auth::user()->id);
            })->orderBy('id', 'desc')->get())
            ->with('messages', array())
            ->with('conversation_id', 0);
    }

    //vraća sve razgovore prijavljenog korisnika
    public function getConversations()
    {
        return Conversation::whereHas('participants', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);})->orderBy('id', 'desc')->get();
    }

    //vraća sve poruke u razgovoru čiji id je proslijeđen
    public function getMessages($conversation_id)
    {
        if (Participant::where('user_id', '=', Auth::user()->id)->where('conversation_id','=',$conversation_id)
            ->first()){
            return Message::where('conversation_id', '=', $conversation_id)->get();
        }
        else {
            return redirect('/home');
        }

    }
}
