<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\Conversation;
use App\File;
use App\Notifications\NewPost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index')->with('posts', $posts);
    }

    public function create()
    {
        $conversations = Conversation::all();
        $collegiums = Collegium::all();

        return view('post.create', ['conversations' => $conversations], ['collegiums' => $collegiums]);
    }


    public function store(Request $request)
    {

        // notification
        $users = User::leftJoin('follower_user', 'users.id', '=', 'follower_user.follower_id')
            ->where('follower_user.user_id', '=', auth()->user()->id)->get(['users.*']);


        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'max:2000',
            ]);

            $filenameWithExt = $request->file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file->getClientOriginalExtension();
            $filesize = $request->file->getClientSize();
            $filepath = $request->file->getPath();
            $tasks = $request['task_id'];

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file->storeAs('/', $filenameToStore);


            $file = new File;
            $file->name = $filenameToStore;
            $file->size = $filesize;
            $file->path = $filepath;
            $file->task_id = $tasks;

            $file->save();

            $conversation = new Conversation();
            $conversation->title = "Post";
            $conversation->creator_id = Auth::user()->id;
            $conversation->save();


            $post = new Post();
            $post->fill($request->except(['user_id']));
            $post->user_id = Auth::user()->id;
            $post->conversation_id = $conversation->id;
            $post->file_id = $file->id;
            $post->save();

            //notification
            foreach ($users as $user) {
                $user->notify(new NewPost($post));
            }

        } else {

            $conversation = new Conversation();
            $conversation->title = "Post";
            $conversation->creator_id = Auth::user()->id;
            $conversation->save();


            $post = new Post();
            $post->fill($request->except(['user_id']));
            $post->user_id = Auth::user()->id;
            $post->conversation_id = $conversation->id;
            $post->save();

            //notification
            foreach ($users as $user) {
                $user->notify(new NewPost($post));
            }
        }

        return back();
    }


    public function show($id)
    {
        $posts= Post::find($id);
        return view('post.show')->with('posts',$posts);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $conversations = Conversation::all();
        $collegiums = Collegium::all();

        return view('post.edit', array('post' => $post, 'conversations' => $conversations, 'collegiums' => $collegiums));
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();

        return redirect('/posts')->with('warning', 'Ažurirano.');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return back();
    }
}
