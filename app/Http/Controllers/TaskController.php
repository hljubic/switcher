<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Collegium;
use App\File;
use App\Task;
use App\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index')->with('tasks', $tasks);
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
        $tasks = Task::find($id);
        $taskuser = TaskUser::where('user_id', '=', Auth::user()->id)->where('task_id', '=', $tasks->id)->first();

        if (TaskUser::where('user_id', '=', Auth::user()->id)->where('task_id', '=', $id)->exists()) {
            $followButton = true;
        } else {
            $followButton = false;
        }

        return view('task.show', array('tasks' => $tasks, 'followButton' => $followButton, 'taskuser' => $taskuser));
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

        return view('/task.edit', ['task' => $task], ['collegiums' => $collegiums]);
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

    //funkcija koja otvara formu za dodavanje liste studenata na neki zadatak
    public function createUsers($id)
    {
        $taskusers = TaskUser::where('task_id', '=', $id)->get();
        $task = Task::find($id);

        return view('task.createUsers', ['taskusers' => $taskusers], ['task' => $task]);

    }

    //funkcija za spremanje liste studenata na neki zadatak
    public function storeUsers(Request $request)
    {
        if ($request->has('users')) {
            foreach ($request->users as $user_id) {
                $taskuser = new TaskUser();
                $taskuser->status = 'in progress';
                $taskuser->user_id = $user_id;
                $taskuser->task_id = $request->task_id;
                $taskuser->save();
            }
            return redirect('/tasks/' . $request->task_id);
        }else{
            return redirect('/tasks/' . $request->task_id);
        }
    }

    //funkcija koja otvara formu za uređivanje statusa studenata na nekom zadatku
    public function editUsers($id)
    {
        $task = Task::find($id);
        $taskusers = TaskUser::where('task_id', '=', $id)->get();

        return view('task.editUsers', ['task' => $task], ['taskusers' => $taskusers]);
    }

    //funkcija koja ažurira status studenata na nekom zadatku
    public function updateUsers(Request $request, $id)
    {

        foreach ($request->users as $key => $user_id) {
            $taskuser = TaskUser::where('user_id', '=', $user_id)->where('task_id', '=', $id)->first();
            $taskuser->status = $request->statuses[$key];
            $taskuser->task_id = $request->task_id;
            $taskuser->user_id = $user_id;
            $taskuser->save();
        }

        return redirect('/tasks/' . $id);

    }
}
