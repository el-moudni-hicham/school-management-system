<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matieres = Matiere::all();
        return view('matieres.index')->with(['matieres' => $matieres]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'libelle'=>'required | unique:matieres,libelle',
            'semestre'=>'required'
        ]);

        $matiere = Matiere::create($request->all());
        return redirect()->route('matieres.index')->with(['success' => 'La matière a été bien ajoutée !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {

        return view('matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        //
        $request->validate([
            'libelle'=>'required',
            'semestre'=>'required'
        ]);

        $matiere->update($request->all());
            return redirect()->route('matieres.index')->with(['success' => 'La matière a été bien modifiée !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $matiere = Matiere::where('id', $id)->first();
        $matiere->delete();
        return redirect()->route("matieres.index")->with([
            "success" => "La matière a été bien supprimée !"
        ]);
    }
}
