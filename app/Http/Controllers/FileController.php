<?php

namespace App\Http\Controllers;

use App\File;
use App\Post;
use App\Task;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view('file.index', ['files' => $files]);
    }


    public function create()
    {
        $posts = Post::all();
        $tasks = Task::all();
        return view('file.create', ['posts' => $posts], ['tasks' => $tasks]);
    }


    public function store(Request $request)
    {
        $files = new File();
        $files->fill($request->all());
        $files->save();

        return redirect('files/create')->with('success', 'Kreirano ');
    }


    public function show($id)
    {
        return File::find($id);
    }


    public function edit($id)
    {
        $files = File::find($id);
        $posts = Post::all();
        $tasks = Task::all();
        return view('file.edit', ['files' => $files, 'posts' => $posts, 'tasks' => $tasks]);
    }


    public function update(Request $request, $id)
    {
        $files = File::find($id);
        $files->fill($request->all());
        $files->save();

        return redirect('/files')->with('warning', 'Ažurirano ');
    }


    public function destroy($id)
    {
        $files = File::find($id);
        $files->delete();
        return redirect('/files')->with('danger', 'Izbrisano ');
    }

    public function showFile() {

        return view('task.show');
    }

    public function  storeFile(Request $request){


        if($request->hasFile('file')){

            $request->validate([
                'file' => 'max:2000',
            ]);

            $filenameWithExt = $request->file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file->getClientOriginalExtension();
            $filesize = $request->file->getClientSize();
            $filepath = $request->file->getPath();
            $filedesc = $request['description'];
            $tasks = $request['task_id'];

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $request->file->storeAs('/',$filenameToStore);

            $files = new File;
            $files->name = $filenameToStore;
            $files->size = $filesize;
            $files->path = $filepath;
            $files->description = $filedesc;
            $files->task_id = $tasks;

            $files->save();
        }
        else{

            return redirect()->back()->with('warning', 'Niste odabrali datoteku');
        }

        return redirect()->back()->with('success','Datoteka je učitana');
    }

}
