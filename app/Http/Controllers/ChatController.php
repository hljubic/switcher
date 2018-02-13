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
            $q->where('user_id', '=', Auth::user()->id);})->orderBy('last_message_time', 'desc')->get();

        foreach ($conversations as $conversation) {
            $participants = Participant::where('conversation_id', $conversation->id)->where('user_id','!=',Auth::user()->id)->get();
            $message = Message::where('conversation_id','=',$conversation->id)->orderBy('id','desc')->first();
            $users = [];

            foreach ($participants as $participant) {
                array_push($users, User::find($participant->user_id));
            }

            $conversation->participants = $users;
            $conversation->message = $message;
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
//        $id_korisnika = $request->user_id;
        if(count($request->list_user)==1) {
            $participants1 = Participant::where('user_id', '=', $request->list_user)->get();
            $participants2 = Participant::where('user_id', '=', Auth::user()->id)->get();

            foreach ($participants1 as $part1) {
                foreach ($participants2 as $part2) {
                    $partCon = Participant::where('conversation_id','=',$part1->conversation_id)->get()->count();
                    if ($part1->conversation_id == $part2->conversation_id && $partCon<3) {
//                    return $part1->conversation_id;
                        $conversation = Conversation::where('id', '=', $part1->conversation_id)->get();
                        return $conversation;

//                    foreach ($conversation as $conv){
//                        if($part1->conversation_id == $conv->$id){
//                            return $conv;
//                        }
//                    }
//                    return false;
                    }

                }
            }
            if(count($request->list_user)==1) {
                $user = User::find($request->list_user[0]);
                $conversation = new Conversation();
                if (count($request->list_user) > 1)
                    $conversation->title = $request->title;
                else
                    $conversation->title = $user->name;
//        $conversation->title = $user->name . ' - ' . Auth::user()->name;
                $conversation->creator_id = Auth::user()->id;
                $conversation->created_at = $request->created_at;
                $conversation->last_message_time = $request->created_at;
                $conversation->save();
                for ($i = 0; $i < count($request->list_user); $i++) {
                    $participant = new Participant();
                    $participant->conversation_id = $conversation->id;
                    $participant->user_id = $request->list_user[$i];
                    $participant->save();
                }
                $participant = new Participant();
                $participant->conversation_id = $conversation->id;
                $participant->user_id = Auth::user()->id;
                $participant->save();
                return $this->getConversations();
            }
        }
        else {
//        $user = User::find($request->user_id);
            $conversation = new Conversation();
            if (count($request->list_user) > 1)
                $conversation->title = $request->title;
            else
                $conversation->title = "Test 1";
//        $conversation->title = $user->name . ' - ' . Auth::user()->name;
            $conversation->creator_id = Auth::user()->id;
            $conversation->created_at = $request->created_at;
            $conversation->last_message_time = $request->created_at;
            $conversation->save();
            for ($i = 0; $i < count($request->list_user); $i++) {
                $participant = new Participant();
                $participant->conversation_id = $conversation->id;
                $participant->user_id = $request->list_user[$i];
                $participant->save();
            }
            $participant = new Participant();
            $participant->conversation_id = $conversation->id;
            $participant->user_id = Auth::user()->id;
            $participant->save();
            return $this->getConversations();
        }

    }
    //kreira novu poruku u razgovoru
    public function createMessage(Request $request){
        $message = new Message();
        $message->content = $request->content_msg;
        $message->conversation_id = $request->conversation_id;
        $message->created_at = $request->created_at;
        $message->sender_id = Auth::user()->id;
        $message->save();

        $conversation = Conversation::find($request->conversation_id);
        $conversation->last_message_time = $request->created_at;
        $conversation->save();

        return self::getMessages($request->conversation_id);
    }
    public function createConversation2(Request $request)
    {
        $participants1 = Participant::where('user_id', '=', $request->user_id)->get();
        $participants2 = Participant::where('user_id', '=', Auth::user()->id)->get();

        foreach ($participants1 as $part1){
            foreach ($participants2 as $part2){
                if($part1->conversation_id == $part2->conversation_id){
                    $conversation = Conversation::find($part1->conversation_id);
                    $conversation->last_message_time=date('y-m-d H:i:s');
                    $conversation->save();
                    return view('chat.index');

                }
            }
        }


        $user = User::find($request->user_id);
        $conversation = new Conversation();
        $conversation->title = $user->name . ' - ' . Auth::user()->name;
        $conversation->creator_id = Auth::user()->id;
        $conversation->created_at = $request->created_at;
        $conversation->save();

        $participant = new Participant();
        $participant->conversation_id = $conversation->id;
        $participant->user_id = $request->user_id;
        $participant->save();

        $participant = new Participant();
        $participant->conversation_id = $conversation->id;
        $participant->user_id = Auth::user()->id;
        $participant->save();
        return view('chat.index');
    }
}
