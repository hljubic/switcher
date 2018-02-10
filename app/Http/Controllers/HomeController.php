<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\File;
use App\FollowerUser;
use App\Post;
use App\Task;
use App\Message;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

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
