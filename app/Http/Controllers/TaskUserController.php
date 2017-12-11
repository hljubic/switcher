<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskUser;
use App\User;
use Illuminate\Http\Request;
use Auth;

class TaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = TaskUser::all();
        return view('team.index')->with('teams',$teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $tasks = Task::all();

        return view('team.create', ['tasks' => $tasks], ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taskusers = new TaskUser();
        $taskusers->fill($request->all());
        $taskusers->save();

        return redirect('/taskuser')->with('success', 'Tim uspješno kreiran.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = TaskUser::find($id);
        return view('team.index')->with('team',$team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskuser = TaskUser::find($id);
        $users = User::all();
        $tasks = Task::all();

        return view('team.edit', array('taskuser' => $taskuser, 'tasks' => $tasks, 'users' => $users));
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
        $taskuser = TaskUser::find($id);
        $taskuser->fill(array_filter($request->all(), 'strlen'));
        $taskuser->save();

        return redirect('/taskuser')->with('success', 'Podaci ažurirani.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskuser = TaskUser::find($id);
        $taskuser->delete();

        return redirect('/taskuser')->with('success', 'Tim izbrisan.');
    }

    public function AddMeToTask($id){

        $followers = new TaskUser();
        $followers->task_id = $id;
        $followers->user_id = Auth::user()->id;
        $followers->save();

        return redirect()->back()->with('success','Upisani ste na zadatak');


    }


}
