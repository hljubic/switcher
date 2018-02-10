<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{

    public function index(){
        $studies = Study::all();
        return view('study.index', ['studies' => $studies]);
    }


    public function create()
    {
        $faculties = Faculty::all(); //FK from faculty
        return view('study.create', ['faculties' => $faculties]);

    }


    public function store(Request $request)
    {
        $studies = new Study();
        $studies->fill($request->all());
        $studies->save();
        return redirect('/studies/create')->with('success', 'Studij kreiran.');
    }


    public function show($id)
    {
        $studies = Study::find($id);
        return view('study.show')->with('studies',$studies);
    }

    public function edit($id)
    {
        $studies = Study::find($id);
        $faculties = Faculty::all();

        return view('study.edit', array('studies' => $studies, 'faculties' => $faculties));

    }


    public function update(Request $request, $id)
    {
        $studies = Study::find($id); //finding study with
        $studies->fill($request->all());
        $studies->save();

        return redirect('home')->with('success', 'Podatci azurirani.'); //returns to create form
    }


    public function destroy($id)
    {
        $studies = Study::find($id);
        $studies->delete();
        return redirect('/studies')->with('success', 'Studij izbrisan.');
    }
}
