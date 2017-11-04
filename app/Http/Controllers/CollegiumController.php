<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\Conversation;
use App\User;
use Illuminate\Http\Request;

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

        return redirect('collegiums/create')->with('success', 'Kolegij kreiran.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collegiums = Collegium::find($id);
        return view('collegium.show')->with('collegiums', $collegiums);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
