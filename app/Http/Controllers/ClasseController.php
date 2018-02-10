<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Collegium;
use Illuminate\Http\Request;

class ClasseController extends Controller
{

    public function index()
    {
        $classes = Classe::all();
        return view('classe.index', ['classes' => $classes]);
    }


    public function create()
    {
        $collegiums = Collegium::all();

        return view('classe.create', ['collegiums' => $collegiums]);
    }


    public function store(Request $request)
    {
        $classes = new Classe();
        $classes->fill($request->all());
        $classes->save();

        return back()->with('success', 'Kreirano ');
    }


    public function show($id)
    {
        return Classe::find($id);
    }


    public function edit($id)
    {
        $classes = Classe::find($id);
        $collegiums = Collegium::all();

        return view('classe.edit',['collegiums' => $collegiums, 'classes' => $classes]);

    }


    public function update(Request $request, $id)
    {
        $classes = Classe::find($id);
        $classes->fill($request->all());
        $classes->save();

        return redirect('/classes')->with('warning', 'Ažurirano ');
    }


    public function destroy($id)
    {
        $classes = Classe::find($id);
        $classes->delete();
        return redirect('/classes')->with('danger', 'Izbrisano ');
    }

}
