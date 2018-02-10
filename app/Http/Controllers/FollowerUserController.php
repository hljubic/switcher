<?php

namespace App\Http\Controllers;

use App\FollowerUser;
use App\Notifications\NewFollower;
use App\User;
use Illuminate\Http\Request;
use Auth;

class FollowerUserController extends Controller
{

    public function index()
    {
        $followers = FollowerUser::all();

        return view('follower.index', ['followers' => $followers]);
    }


    public function create()
    {
        $users = User::all();
        return view('follower.create', ['users' => $users]);
    }


    public function store(Request $request)
    {
        $followers = new FollowerUser();
        $followers->fill($request->all());
        $followers->save();



        return redirect()->back()->with('success', 'Pratite  korisnika.');
    }


    public function show($id)
    {
        return FollowerUser::find($id);
    }


    public function edit($id)
    {
        $followers = FollowerUser::find($id);
        $users = User::all();

        return view('follower.edit', array('followers' => $followers, 'users' => $users));
    }


    public function update(Request $request, $id)
    {
        $followers = FollowerUser::find($id);
        $followers->fill($request->all());
        $followers->save();

        return redirect('home')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $followers = FollowerUser::find($id);

        $followers->delete();

        return redirect('/followers')->with('danger', "Izbrisano");
    }

    public function follow($id)
    {
        $followers = new FollowerUser();
        $followers->user_id = $id;
        $followers->follower_id = Auth::user()->id;
        $followers->save();

        //notification data -> user gets notifications if other user starts to follow him

        $users = User::leftJoin('follower_user','users.id','=','follower_user.user_id')
            ->where('follower_user.follower_id','=',auth()->user()->id)
            ->where('follower_user.user_id','=',$id)->get(['users.*']);

        foreach ($users as $user)
        {
            $user->notify(new NewFollower($followers));
        }

        return redirect()->back()->with('success', 'Pratite korisnika.');
    }

    public function unfollow($id)
    {
        $followers = FollowerUser::where('follower_id', '=', Auth::user()->id)->where('user_id','=',$id);
        $followers->delete();
        return redirect()->back()->with('warning', 'Prestali ste pratiti korisnika.');
    }


}
