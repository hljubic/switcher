<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\FollowerUser;
use App\Post;
use App\Study;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name','asc')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studies = Study::all();
        return view('user.create', ['studies' => $studies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->except('password'));
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect('/users')->with('success', 'Korisnik kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $followers = FollowerUser::where('user_id', '=', $id)->count();
        $following = FollowerUser::where('follower_id', '=', $id)->count();
        $collegiums = Collegium::where('prof_id', '=', $id)->orWhere('assist_id', '=', $id)->orwhereHas('user', function ($q) use ($id) {
            $q->where('user_id', '=', $id);
        })->get();
        $posts = Post::where('user_id', '=', $id)->get();

        if (FollowerUser::where('follower_id', '=', Auth::user()->id)->where('user_id','=',$id)->exists()) {
            $followButton = true;
        } else {
            $followButton = false;
        }

        return view('user.profil', array('user' => $user, 'followers' => $followers, 'following' => $following,
            'collegiums' => $collegiums, 'posts' => $posts, 'followButton' => $followButton));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$model = $this->getModel();

        $this->authorize('update', $model);*/

        $user = User::find($id);
        $studies = Study::all();
        return view("user.edit", ['user' => $user], ['studies' => $studies]);
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

        $user = User::find($id);
        if ($request->filled('password')) {
            $user->fill(array_filter($request->except('password'), 'strlen'));
            $user->password = bcrypt($request['password']);
        } else {
            $user->fill(array_filter($request->all(), 'strlen'));
        }
        $user->save();
        return redirect('/users')->with('success', 'Podatci korisnika ažurirani.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Korisnik izbrisan.');
    }

    public function imenik()
    {
        $users = User::where('type', '=', 'professor')->orderBy('name', 'asc')->paginate(8);

        return view('user.imenik', ['users' => $users]);
    }

    /*public function getModel()
    {
        return 'App\\Models\\' . static::$model;
    }*/
}