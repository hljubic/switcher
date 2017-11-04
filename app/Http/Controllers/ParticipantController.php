<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::orderBy('conversation_id')->get();

        return view('participant.index', ['participants' => $participants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $conversations = Conversation::all();

        return view('participant.create', ['users' => $users], ['conversations' => $conversations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participant = new Participant();
        $participant->fill($request->all());
        $participant->save();

        return redirect('/participants')->with('success', 'Korisnik dodan u razgovor.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Participant::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::find($id);
        $conversations = Conversation::all();
        $users = User::all();

        return view("participant.edit", array('participant' => $participant, 'users' => $users, 'conversations' => $conversations));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);
        $participant->fill($request->all());
        $participant->save();

        return redirect('/participants')->with('success', 'Podatci ažurirani.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);
        $participant->delete();

        return redirect('/participants')->with('success', 'Korisnik izbrisan iz razgovora');
    }
}
