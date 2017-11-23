<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Study;
use Illuminate\Http\Request;


class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty.index', ['faculties' => $faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculties = new Faculty();
        $faculties->fill($request->all());
        $faculties->save();
        return redirect('/faculties/create')->with('success', 'Fakultet dodan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculties = Faculty::find($id);
        $studies = Study::where('faculty_id', '=', $id)->get();
        return view('faculty.show', ['faculties' => $faculties, 'studies' => $studies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties = Faculty::find($id);

        return view('faculty.edit', array('faculties' => $faculties));
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
        $faculties = Faculty::find($id); //find faculty with id
        $faculties->fill($request->all());
        $faculties->save();

        return redirect('home')->with('success', 'Podatci azurirani');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);

        $faculty->delete();

        return redirect('/faculties')->with('success', 'Fakultet izbrisan.');
    }


}
