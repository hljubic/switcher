<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\FollowerUser;
use App\Post;
use App\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $collegiums = Collegium::where('prof_id', '=', Auth::user()->id)->orWhere('assist_id', '=', Auth::user()->id)
            ->orwhereHas('user', function ($q) {
                $q->where('user_id', '=', Auth::user()->id);
            })->get();
        $tasks = Task::whereHas('user', function ($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();
        $friends = FollowerUser::where('follower_id', '=', Auth::user()->id)->get();
        return view('home', array('posts' => $posts, 'collegiums' => $collegiums, 'tasks' => $tasks,
            'friends' => $friends));
    }
}
