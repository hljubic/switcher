<?php
namespace App\Http\Controllers;
use App\Collegium;
use App\FollowerUser;
use App\Post;
use App\Study;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $user = Auth::user();
        $followers = FollowerUser::where('user_id', '=', $user->id)->count();
        $following = FollowerUser::where('follower_id', '=', $user->id)->count();
        $collegiums = Collegium::where('prof_id', '=', $user->id)->orWhere('assist_id', '=', $user->id)->orwhereHas('user', function ($q) use ($user) {
            $q->where('user_id', '=', $user->id);
        })->get();
        if (FollowerUser::where('follower_id', '=', $user->id)->where('user_id', '=', $user->id)->exists()) {
            $followButton = true;
        } else {
            $followButton = false;
        }
        return view('user.profil', array('user' => $user, 'followers' => $followers, 'following' => $following,
            'collegiums' => $collegiums, 'followButton' => $followButton));
    }

    public function edit()
    {
        /*$model = $this->getModel();
        $this->authorize('update', $model);*/
        $user = Auth::user();
        $studies = Study::all();
        return view("user.edit", ['user' => $user], ['studies' => $studies]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->filled('password')) {
            $user->fill(array_filter($request->except('password'), 'strlen'));
            $user->password = bcrypt($request['password']);
        } else {
            $user->fill(array_filter($request->all(), 'strlen'));
        }
        $user->save();
        return redirect('/users')->with('success', 'Podatci korisnika ažurirani.');
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
    public  function searchUsers(){
        return User::orderBy('name','asc')->get();
    }
}

