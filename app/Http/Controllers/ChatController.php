<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use Auth;

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
            ->with('conversations', Conversation::where('creator_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get())
            ->with('messages', array())
            ->with('conversation_id',0);

    }

    public function getMessages(Request $request, $conversation_id){
        //return Message::where('conversation_id', $conversation_id)->get();
        return view('chat.index')
            ->with('conversations', Conversation::where('creator_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get())
            ->with('messages', Message::where('conversation_id', "=", $conversation_id)->get())
            ->with('conversation_id',  $conversation_id);
    }
}
