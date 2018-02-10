<?php

namespace App\Http\Controllers;

use App\Collegium;
use App\CollegiumStudy;
use App\Study;
use Illuminate\Http\Request;

class CollegiumStudyController extends Controller
{
    public function index()
    {
        $collegium_study = CollegiumStudy::all();
        return view('collegiumStudy.index', ['collegium_study' => $collegium_study]);
    }


    public function create()
    {
        $collegiums = Collegium::all();
        $studies = Study::all();
        return view('collegiumStudy.create', ['collegiums' => $collegiums], ['studies' => $studies]);
    }


    public function store(Request $request)
    {
        $collegium_study = new CollegiumStudy();
        $collegium_study->fill($request->all());
        $collegium_study->save();

        return redirect('collegium_study/create')->with('success', 'Kreirano ');
    }

    public function show($id)
    {
        return CollegiumStudy::find($id);
    }


    public function edit($id)
    {
        $collegium_study = CollegiumStudy::find($id);
        $collegiums = Collegium::all();
        $studies = Study::all();
        return view('collegiumStudy.edit', array('collegium_study' => $collegium_study, 'collegiums' => $collegiums, 'studies' => $studies));
    }

    public function update(Request $request, $id)
    {
        $collegium_study = CollegiumStudy::find($id);
        $collegium_study->fill($request->all());
        $collegium_study->save();

        return redirect('/collegium_study')->with('warning', 'Ažurirano. ');
    }


    public function destroy($id)
    {
        $collegium_study = CollegiumStudy::find($id);
        $collegium_study->delete();
        return redirect('/collegium_study')->with('danger', 'Izbrisano ');
    }
}
