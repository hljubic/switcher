<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\FollowerUser;
use App\Post;
use App\Study;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Notifiable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('user.index', ['users' => $users]);
    }


    public function create()
    {
        $studies = Study::all();
        return view('user.create', ['studies' => $studies]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->except('password'));
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect('/users')->with('success', 'Korisnik kreiran.');
    }


    public function show($id)
    {
        $user = User::find($id);
        $followers = FollowerUser::where('user_id', '=', $id)->count();
        $following = FollowerUser::where('follower_id', '=', $id)->count();

        $myFollowers = FollowerUser::where('user_id', '=', $id)->get();
        $myFollowings = FollowerUser::where('follower_id', '=', $id)->get();
        $collegiums = Collegium::where('prof_id', '=', $id)->orWhere('assist_id', '=', $id)
            ->orwhereHas('user', function ($q) use ($id) {
                $q->where('user_id', '=', $id);
            })->get();

        if (FollowerUser::where('follower_id', '=', Auth::user()->id)->where('user_id', '=', $id)->exists()) {
            $followButton = true;
        } else {
            $followButton = false;
        }

        return view('user.profil', array('user' => $user, 'followers' => $followers, 'following' => $following,
            'collegiums' => $collegiums, 'followButton' => $followButton, 'myFollowers' => $myFollowers, 'myFollowings' => $myFollowings));
    }

    public function edit($id)
    {
        /*$model = $this->getModel();

        $this->authorize('update', $model);*/

        $user = User::find($id);
        $studies = Study::all();
        return view("user.edit", ['user' => $user], ['studies' => $studies]);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        if ($request->filled('password')) {
            $user->fill(array_filter($request->except('password'), 'strlen'));
            $user->password = bcrypt($request['password']);
        } else {
            $user->fill(array_filter($request->all(), 'strlen'));
        }
        $user->save();
        return redirect('/users')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('danger', 'Izbrisano');
    }

    public function imenik()
    {
        $users = User::where('type', '=', 'professor')->orderBy('name', 'asc')->paginate(8);

        return view('user.imenik', ['users' => $users]);
    }

    public function getProfessors()
    {
        return User::where('type', '=', 'professor')->orderBy('name', 'asc')->get();
    }

    public function searchUsers()
    {

        return User::orderBy('name', 'asc')->get();
    }
}