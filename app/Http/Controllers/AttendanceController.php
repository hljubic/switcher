<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classe;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $users = User::all();
        return view('attendance.create', ['classes' => $classes], ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach($request->users as $user_id){
            $attendances = new Attendance();
            $attendances->user_id = $user_id;
            $attendances->class_id = $request->class_id;
            $attendances->save();
        }

        return back()->with('success', 'Kreirano ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendances = Attendance::where('class_id', '=', $id)->get();
        $classe = Classe::find($id);
        $collegiums = $classe->collegium;
        return view('attendance.show', array('attendances'=>$attendances, 'classe'=>$classe, 'collegiums'=>$collegiums));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendances = Attendance::find($id);
        $classes = Classe::all();
        $users = User::all();
        return view('attendance.edit', ['users' => $users, 'attendances' => $attendances, 'classes' => $classes]);
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
        $attendances = Attendance::find($id);
        $attendances->fill($request->all());
        $attendances->save();
        return redirect('/attendances')->with('success', 'Ažurirano ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendances = Attendance::find($id);
        $attendances->delete();
        return redirect('/attendances')->with('success', 'Izbrisano ');


    }
}
