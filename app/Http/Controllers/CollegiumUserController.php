<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\CollegiumUser;
use App\Notifications\FollowedCollegium;
use App\User;
use Illuminate\Http\Request;

use Auth;

class CollegiumUserController extends Controller
{

    public function index()
    {
        $collegium_users = CollegiumUser::all();

        return view('collegiumuser.index', ['$collegium_users' => $collegium_users]);
    }

    public function create()
    {
        $users = User::all();
        $collegiums = Collegium::all();

        return view('collegiumuser.create', ['collegiums' => $collegiums], ['users' => $users]);
    }


    public function store(Request $request)
    {
        $collegiumusers = new CollegiumUser();
        $collegiumusers->fill($request->all());
        $collegiumusers->save();

        return redirect('/collegium_user')->with('success', 'Kreirano');
    }


    public function show($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        return view('collegiumuser.show')->with('collegiumusers', $collegiumusers);
    }


    public function edit($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $users = User::all();
        $collegiums = Collegium::all();

        return view('collegiumuser.edit', array('collegiumusers' => $collegiumusers, 'collegiums' => $collegiums, 'users' => $users));
    }

    public function update(Request $request, $id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $collegiumusers->fill(array_filter($request->all(), 'strlen'));
        $collegiumusers->save();

        return redirect('/collegium_user')->with('warning', 'Ažurirano.');
    }

    public function destroy($id)
    {
        $collegiumusers = CollegiumUser::find($id);
        $collegiumusers->delete();

        return redirect('/collegium_user')->with('danger', ' Izbrisano.');
    }

    public function AddMeToCollegium($id)
    {

        $followers = new CollegiumUser();
        $followers->collegium_id = $id;
        $followers->user_id = Auth::user()->id;
        $followers->save();


        //notifications data, when 'student' is enrolled on 'collegium', 'professor' and 'assistent' get notification

        $prof = Collegium::leftJoin('collegium_user', 'collegiums.id', '=', 'collegium_user.collegium_id')
            ->where('collegium_user.user_id', '=', auth()->user()->id)
            ->where('collegiums.id', '=', $id)
            ->first();

        $usersP = User::where('users.id', '=', $prof["prof_id"])->get();
        $usersA = User::where('users.id', '=', $prof["assist_id"])->get();

        foreach ($usersP as $userP) {

            foreach ($usersA as $userA) {
                $userP->notify(new FollowedCollegium($followers));
                $userA->notify(new FollowedCollegium($followers));
            }

        }

        //end of notification

        return redirect()->back()->with('success', 'Upisani ste na kolegij');
    }

    public function RemoveMeFromCollegium($id)
    {
        $followers = CollegiumUser::where('user_id', '=', Auth::user()->id)->where('collegium_id', '=', $id);
        $followers->delete();
        return redirect()->back()->with('warning', 'Isipisani ste sa kolegija.');
    }


}
