<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\Participant;
use App\User;
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
        $conversations = Conversation::whereHas('participants', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);})->orderBy('id', 'desc')->get();

        foreach ($conversations as $conversation) {
            $participants = Participant::where('conversation_id', $conversation->id)->where('user_id','!=',Auth::user()->id)->get();

            $users = [];
            foreach ($participants as $participant) {
                array_push($users, User::find($participant->user_id));
            }

            $conversation->participants = $users;
        }

        return $conversations;
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

    //vraća sve sudionike u razgovoru čiji id je proslijeđen
    public function getParticipants($conversation_id)
    {
        return Participant::where('conversation_id','=',$conversation_id)->get();
    }

    //kreira novi razgovor sa korisnikom čiji id je proslijeđen
    public function createConversation(Request $request)
    {
        //$user=User::find($request);
        $conversation = new Conversation();
        $conversation->title = "Razgovor 9";
            //$user->name.', '.Auth::user()->name;
        $conversation->creator_id = Auth::user()->id;
        $conversation->save();

        $participant = new Participant();
        $participant->conversation_id = $conversation->id;
        $participant->user_id = $request->user_id;
        $participant->save();

        $participant = new Participant();
        $participant->conversation_id = $conversation->id;
        $participant->user_id = Auth::user()->id;
        $participant->save();

        return $this->getConversations();

    }

    //kreira novu poruku u razgovoru
    public function createMessage(Request $request){
        $message = new Message();
        $message->content = $request->content_msg;
        $message->conversation_id = $request->conversation_id;
        $message->created_at = $request->created_at;
        $message->sender_id = Auth::user()->id;
        $message->save();

        return self::getMessages($request->conversation_id);
    }
}
