<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Study;
use Illuminate\Http\Request;


class FacultyController extends Controller
{

    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty.index', ['faculties' => $faculties]);
    }


    public function create()
    {

        return view('faculty.create');
    }


    public function store(Request $request)
    {
        $faculties = new Faculty();
        $faculties->fill($request->all());
        $faculties->save();
        return redirect('/faculties/create')->with('success', 'Kreirano');
    }


    public function show($id)
    {
        $faculties = Faculty::find($id);
       // $studies = Study::where('faculty_id', '=', $id)->get();
        return view('faculty.show', ['faculties' => $faculties]);
    }


    public function edit($id)
    {
        $faculties = Faculty::find($id);

        return view('faculty.edit', array('faculties' => $faculties));
    }


    public function update(Request $request, $id)
    {
        $faculties = Faculty::find($id); //find faculty with id
        $faculties->fill($request->all());
        $faculties->save();

        return redirect('home')->with('warning', 'Ažurirano.');
    }

    public function destroy($id)
    {
        $faculty = Faculty::find($id);

        $faculty->delete();

        return redirect('/faculties')->with('danger', 'Izbrisano.');
    }


}
