<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\Notifications\CommentOnPost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::all();

        return view('message.index', ['messages' => $messages]);
    }


    public function create()
    {
        $users = User::all();
        $conversations = Conversation::all();

        return view('message.create', ['users' => $users], ['conversations' => $conversations]);
    }

    public function store(Request $request)
    {

        $message = new Message();
        $message->fill($request->except(['sender_id']));
        $message->sender_id = Auth::user()->id;
        $message->save();


        // owner of post gets notification if other user comment on it

        $postUser = Post::leftJoin('conversations', 'posts.conversation_id', '=', 'conversations.id')
            ->leftJoin('messages', 'conversations.id', '=', 'messages.conversation_id')
            ->where('conversations.id', '=', $message->conversation->id)
            ->where('messages.sender_id', '=', auth()->user()->id)
            ->first();

        $users = User::where('users.id', '=', $postUser["user_id"])->get();

        foreach ($users as $user) {

            if ($user->id != $message->sender_id) {
                $user->notify(new CommentOnPost($message));
            }

        }
        // end

        return back();
    }


    public function show($id)
    {
        return Message::find($id);
    }

    public function edit($id)
    {
        $message = Message::find($id);
        $users = User::all();
        $conversations = Conversation::all();

        return view('message.edit', array('message' => $message, 'conversations' => $conversations, 'users' => $users));
    }


    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->fill($request->all());
        $message->save();

        return redirect('/messages')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $message = Message::find($id);

        $message->delete();

        return back();
    }
}
