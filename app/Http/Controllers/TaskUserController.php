<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\Notifications\FollowedTask;
use App\Task;
use App\TaskUser;
use App\User;
use Illuminate\Http\Request;
use Auth;

class TaskUserController extends Controller
{

    public function index()
    {
        $teams = TaskUser::all();
        return view('team.index')->with('teams',$teams);
    }


    public function create()
    {
        $users = User::all();
        $tasks = Task::all();

        return view('team.create', ['tasks' => $tasks], ['users' => $users]);
    }


    public function store(Request $request)
    {
        $taskusers = new TaskUser();
        $taskusers->fill($request->all());
        $taskusers->save();

        return redirect('/taskuser')->with('success', 'Kreirano.');

    }

    public function show($id)
    {
        $team = TaskUser::find($id);
        return view('team.index')->with('team',$team);
    }


    public function edit($id)
    {
        $taskuser = TaskUser::find($id);
        $users = User::all();
        $tasks = Task::all();

        return view('team.edit', array('taskuser' => $taskuser, 'tasks' => $tasks, 'users' => $users));
    }


    public function update(Request $request, $id)
    {
        $taskuser = TaskUser::find($id);
        $taskuser->fill(array_filter($request->all(), 'strlen'));
        $taskuser->save();

        return redirect('/taskuser')->with('warning', 'Ažurirano.');
    }

    public function destroy($id)
    {
        $taskuser = TaskUser::find($id);
        $taskuser->delete();

        return redirect('/taskuser')->with('danger', 'Izbrisano');
    }

    public function AddMeToTask($id){

        $followers = new TaskUser();
        $followers->task_id = $id;
        $followers->user_id = Auth::user()->id;
        $followers->save();

        //notification when student enroll on task

        $prof  = Collegium::leftJoin('tasks','collegiums.id','=','tasks.collegium_id')
            ->leftJoin('task_user','tasks.id','=','task_user.task_id')
            ->where('task_user.user_id','=',auth()->user()->id)
            ->where('tasks.id','=',$id)
            ->first();

        $usersP = User::where('users.id','=',$prof["prof_id"])->get();
        $usersA = User::where('users.id','=',$prof["assist_id"])->get();

        foreach($usersP as $userP){

            foreach ($usersA as $userA)
            {
                $userP->notify(new FollowedTask($followers));
                $userA->notify(new FollowedTask($followers));
            }


        }

        return redirect()->back()->with('success','Upisani ste na zadatak');


    }


}
