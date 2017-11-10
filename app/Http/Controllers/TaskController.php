<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =  Task::all();
        return view('task.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collegiums = Collegium::all();

        return view('task.create', ['collegiums' => $collegiums]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = new Task();
        $tasks->fill($request->all());
        $tasks->save();

        return redirect('/tasks')->with('success', 'Zadatak uspješno kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Task::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $collegiums = Collegium::all();

        return view('/task.edit',['task' => $task],['collegiums' => $collegiums]);
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
       $task = Task::find($id);
       $task->fill(array_filter($request->all(), 'strlen'));
       $task->save();

       return redirect('/tasks')->with('success', 'Podaci zadatka ažurirani.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Zadatak izbrisan.');
    }
}
