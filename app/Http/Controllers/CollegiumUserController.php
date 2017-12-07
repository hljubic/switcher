<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\CollegiumUser;
use App\User;
use Illuminate\Http\Request;

use Auth;

class CollegiumUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collegium_users = CollegiumUser::all();

        return view('collegiumuser.index', ['$collegium_users' => $collegium_users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $collegiums = Collegium::all();

        return view('collegiumuser.create', ['collegiums' => $collegiums], ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collegiumusers = new CollegiumUser();
        $collegiumusers->fill($request->all());
        $collegiumusers->save();

        return redirect('/collegium_user')->with('success', 'Tim uspješno kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        return view('collegiumuser.show')->with('collegiumusers',$collegiumusers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $users = User::all();
        $collegiums = Collegium::all();

        return view('collegiumuser.edit', array('collegiumusers' => $collegiumusers, 'collegiums' => $collegiums, 'users' => $users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $collegiumusers->fill(array_filter($request->all(), 'strlen'));
        $collegiumusers->save();

        return redirect('/collegium_user')->with('success', 'Podaci ažurirani.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $collegiumusers->delete();

        return redirect('/collegium_user')->with('success', 'Tim izbrisan.');
    }

    public function AddMeToCollegium ($id){

        $followers = new CollegiumUser();
        $followers->collegium_id = $id;
        $followers->user_id = Auth::user()->id;
        $followers->save();

        return redirect()->back()->with('success','Upisani ste na kolegij');
    }

    public function RemoveMeFromCollegium($id)
    {
        $followers = CollegiumUser::where('user_id', '=', Auth::user()->id)->where('collegium_id','=',$id);
        $followers->delete();
        return redirect()->back()->with('success', 'Otpratili ste korisnika.');
    }


}
