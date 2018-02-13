<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classe;
use App\User;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{

    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', ['attendances' => $attendances]);
    }


    public function create()
    {
        $classes = Classe::all();
        $users = User::all();
        return view('attendance.create', ['classes' => $classes], ['users' => $users]);
    }


    public function store(Request $request)
    {

        $attendances = new Attendance();
        $attendances->fill($request->all());
        $attendances->save();

        return back()->with('success', 'Kreirano ');
    }


    public function show($id)
    {

        $attendances = Attendance::where('class_id', '=', $id)->get();

        $classe = Classe::find($id);
        $collegiums = $classe->collegium;
        return view('attendance.show', array('attendances' => $attendances, 'classe' => $classe, 'collegiums' => $collegiums));
    }

    public function edit($id)
    {
        $attendances = Attendance::find($id);
        $classes = Classe::all();
        $users = User::all();
        return view('attendance.edit', ['users' => $users, 'attendances' => $attendances, 'classes' => $classes]);
    }

    public function update(Request $request, $id)
    {
        $attendances = Attendance::find($id);
        $attendances->fill($request->all());
        $attendances->save();
        return redirect('/attendances')->with('warning', 'Ažurirano ');
    }


    public function destroy($id)
    {
        $attendances = Attendance::find($id);
        $attendances->delete();
        return redirect('/attendances')->with('danger', 'Izbrisano ');


    }

    public function storeUsers(Request $request)
    {
        if($request->has('users')){
            foreach ($request->users as $user_id) {
                $attendances = new Attendance();
                $attendances->user_id = $user_id;
                $attendances->class_id = $request->class_id;
                $attendances->save();
            }

            return redirect('/collegiums/'.$request->collegium_id);
        }else {
            return redirect('/collegiums/'.$request->collegium_id);
        }
    }

    public function downloadCsv($id){
        $attendances = Attendance::where('class_id', '=', $id)->with('user')->get();
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($attendances, ['user.name', 'user.email', 'user.index_number', 'user.study.name'])->download();
    }
}
