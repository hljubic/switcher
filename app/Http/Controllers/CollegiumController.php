<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classe;
use App\Collegium;
use App\CollegiumUser;
use App\Conversation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollegiumController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collegiums = Collegium::all();
        return view('collegium.index')->with('collegiums', $collegiums);
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

        return view('collegium.create', ['users' => $users], ['conversations' => $conversations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collegiums = new Collegium();
        $collegiums->fill($request->all());
        $collegiums->save();

        return redirect('/collegiums')->with('success', 'Kolegij kreiran.');

    }


    public function show($id)
    {
        $collegiums = Collegium::find($id);


       //$this->authorize('show', $collegiums);


        if (CollegiumUser::where('user_id', '=', Auth::user()->id)->where('collegium_id','=',$id)->exists()) {
            $followButton = true;
        } else {
            $followButton = false;
        }

        return view('collegium.show',array('collegiums' => $collegiums,'followButton' => $followButton));

    }

    public function edit($id)
    {
        $collegium = Collegium::find($id);
        $users = User::all();
        return view("collegium.edit", ['collegium' => $collegium], ['users' => $users]);
    }


    public function update(Request $request, $id)
    {
        $collegium = Collegium::find($id);
        $collegium->fill(array_filter($request->all(), 'strlen'));
        $collegium->save();

        return redirect('/collegiums')->with('warning', 'Ažurirano.');
    }

    public function destroy($id)
    {
        $collegium = Collegium::find($id);
        $collegium->delete();

        return redirect('/collegiums')->with('danger', 'Izbrisano.');
    }

}
