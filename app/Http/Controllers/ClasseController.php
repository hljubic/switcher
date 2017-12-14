<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Collegium;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();
        return view('classe.index', ['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collegiums = Collegium::all();

        return view('classe.create', ['collegiums' => $collegiums]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classes = new Classe();
        $classes->fill($request->all());
        $classes->save();

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
        return Classe::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = Classe::find($id);
        $collegiums = Collegium::all();

        return view('classe.edit',['collegiums' => $collegiums, 'classes' => $classes]);

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
        $classes = Classe::find($id);
        $classes->fill($request->all());
        $classes->save();

        return redirect('/classes')->with('success', 'Ažurirano ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classes = Classe::find($id);
        $classes->delete();
        return redirect('/classes')->with('success', 'Izbrisano ');
    }

}
