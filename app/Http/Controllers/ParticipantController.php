<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    public function index()
    {
        $participants = Participant::orderBy('conversation_id')->get();

        return view('participant.index', ['participants' => $participants]);
    }


    public function create()
    {
        $users = User::all();
        $conversations = Conversation::all();

        return view('participant.create', ['users' => $users], ['conversations' => $conversations]);
    }


    public function store(Request $request)
    {
        $participant = new Participant();
        $participant->fill($request->all());
        $participant->save();

        return redirect('/participants')->with('success', 'Kreirano.');
    }


    public function show($id)
    {
        return Participant::find($id);
    }


    public function edit($id)
    {
        $participant = Participant::find($id);
        $conversations = Conversation::all();
        $users = User::all();

        return view("participant.edit", array('participant' => $participant, 'users' => $users, 'conversations' => $conversations));
    }


    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);
        $participant->fill($request->all());
        $participant->save();

        return redirect('/participants')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $participant = Participant::find($id);
        $participant->delete();

        return redirect('/participants')->with('danger', 'Izbrisano.');
    }

}
