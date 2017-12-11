<?php

namespace App\Http\Controllers;

use App\File;
use App\Post;
use App\Task;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('file.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $tasks = Task::all();
        return view('file.create', ['posts' => $posts], ['tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = new File();
        $files->fill($request->all());
        $files->save();

        return redirect('files/create')->with('success', 'Kreirano ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = File::find($id);
        $posts = Post::all();
        $tasks = Task::all();
        return view('file.edit', ['files' => $files, 'posts' => $posts, 'tasks' => $tasks]);
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
        $files = File::find($id);
        $files->fill($request->all());
        $files->save();

        return redirect('/files')->with('success', 'Ažurirano ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = File::find($id);
        $files->delete();
        return redirect('/files')->with('success', 'Izbrisano ');
    }

    public function showFile() {

        return view('task.show');
    }

    public function  storeFile(Request $request){


        if($request->hasFile('file')){

            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $filepath = $request->file->getPath();
            $filedesc = $request['description'];
            $tasks = $request['task_id'];


            $request->file->storeAs('/',$filename);

            $files = new File;
            $files->name = $filename;
            $files->size = $filesize;
            $files->path = $filepath;
            $files->description = $filedesc;
            $files->task_id = $tasks;

            $files->save();
        }

        return redirect()->back()->with('success','Učitali ste datoteku');
    }
}
