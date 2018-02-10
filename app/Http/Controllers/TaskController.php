<?php

namespace App\Http\Controllers;


use App\Collegium;
use App\CollegiumUser;
use App\Notifications\NewTask;
use App\Task;
use App\TaskUser;
use App\User;
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


    public function store(Request $request)
    {
        $tasks = new Task();
        $tasks->fill($request->all());
        $tasks->save();

        //notifications for students who are enrolled in collegium where task has been created
        $taskColl = CollegiumUser::
        where('collegium_id', '=', $tasks->collegium->id)->get();

        for ($index = 0; $index < count($taskColl); $index++) {

            $users = User::where('users.id', '=', $taskColl[$index]["user_id"])->get();

            foreach ($users as $user) {

                $user->notify(new NewTask($tasks));
            }
        }

        return redirect()->back()->with('success', 'Kreirano.');
    }


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


    public function edit($id)
    {
        $task = Task::find($id);
        $collegiums = Collegium::all();

        return view('/task.edit', ['task' => $task], ['collegiums' => $collegiums]);
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->fill(array_filter($request->all(), 'strlen'));
        $task->save();

        return redirect('/tasks')->with('warning', 'Ažurirano.');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks')->with('danger', 'Izbrisano.');
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
        } else {
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
