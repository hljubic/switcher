<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\Conversation;
use App\File;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conversations = Conversation::all();
        $collegiums = Collegium::all();

        return view('post.create', ['conversations' => $conversations], ['collegiums' => $collegiums]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->hasFile('file')){

            $filenameWithExt = $request->file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file->getClientOriginalExtension();
            $filesize = $request->file->getClientSize();
            $filepath = $request->file->getPath();
            $tasks = $request['task_id'];

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $request->file->storeAs('/',$filenameToStore);


            $file = new File;
            $file->name = $filenameWithExt;
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

        }




        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $conversations = Conversation::all();
        $collegiums = Collegium::all();

        return view('post.edit', array('post' => $post, 'conversations' => $conversations, 'collegiums' => $collegiums));
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
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();

        return redirect('/posts')->with('success', 'Podatci ažurirani.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return back();
    }
}
