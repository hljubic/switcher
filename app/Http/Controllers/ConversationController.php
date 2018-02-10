<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Participant;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $conversations = Conversation::all();

        return view('conversation.index', ['conversations' => $conversations]);
    }


    public function create()
    {
        $users = User::all();

        return view('conversation.create', ['users' => $users]);
    }


    public function store(Request $request)
    {
        $conversation = new Conversation();
        $conversation->fill($request->all());
        $conversation->save();

        return redirect('/conversations')->with('success', 'Kreirano.');
    }


    public function show($id)
    {
        return Conversation::find($id);
    }

    public function edit($id)
    {
        $conversation = Conversation::find($id);
        $users = User::all();

        return view('conversation.edit', ['conversation' => $conversation], ['users' => $users]);

    }


    public function update(Request $request, $id)
    {
        $conversation = Conversation::find($id);
        $conversation->fill($request->all());
        $conversation->save();

        return redirect('/conversations')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $conversation = Conversation::find($id);

        $conversation->delete();

        return redirect('/conversations')->with('danger', 'Izbrisano');
    }

    public function dajSudionike($id){

        $conversation=Conversation::find($id);
        return view('chat.conversation', ['conversation' => $conversation]);
    }
}
