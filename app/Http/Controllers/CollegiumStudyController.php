<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\CollegiumStudy;
use App\Study;
use Illuminate\Http\Request;

class CollegiumStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collegium_study = CollegiumStudy::all();
        return view('collegiumStudy.index', ['collegium_study' => $collegium_study]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collegiums = Collegium::all();
        $studies = Study::all();
        return view('collegiumStudy.create', ['collegiums' => $collegiums], ['studies' => $studies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collegium_study = new CollegiumStudy();
        $collegium_study->fill($request->all());
        $collegium_study->save();

        return redirect('collegium_study/create')->with('success', 'Kreirano ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CollegiumStudy::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collegium_study = CollegiumStudy::find($id);
        $collegiums = Collegium::all();
        $studies = Study::all();
        return view('collegiumStudy.edit', array('collegium_study' => $collegium_study, 'collegiums' => $collegiums, 'studies' => $studies));
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
        $collegium_study = CollegiumStudy::find($id);
        $collegium_study->fill($request->all());
        $collegium_study->save();

        return redirect('/collegium_study')->with('success', 'Kreirano ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collegium_study = CollegiumStudy::find($id);
        $collegium_study->delete();
        return redirect('/collegium_study')->with('success', 'Izbrisano ');
    }
}
