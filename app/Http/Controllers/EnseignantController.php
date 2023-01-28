<?php

namespace App\Http\Controllers;

use App\Models\Diplome;
use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enseignants = Enseignant::all();
        return view('enseignants.index')->with(['enseignants' => $enseignants]);
    }

    public function trashedEnseignants()
    {
        $enseignants = Enseignant::onlyTrashed()->get();
        return view('enseignants.trash', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres = Matiere::all();
        if($matieres->count() == 0){
            return redirect()->route('matieres.create');
        }
        return view('enseignants.create')->with(['matieres' => $matieres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            #'adresse' => 'required',
            'cin' => 'required | unique:enseignants,cin',
            'telephone' => 'required ',
            'email' => 'required | email | unique:enseignants,email',
            'date_naissance' => 'date',
            'sexe' => 'required | in:Homme,Femme',
            #'date_service' => 'date',
            'rib' => 'required | digits:24 | unique:enseignants,rib',
            #'type_ens' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'photo' => 'nullable|mimes:jpeg,bmp,png,pdf' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('enseignant', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $enseignant = new Enseignant([
                "photo" => $request->file->hashName(),
                "nom" => $request->get('nom'),
                "prenom" => $request->get('prenom'),
                "adresse" => $request->get('adresse'),
                "cin" => $request->get('cin'),
                "telephone" => $request->get('telephone'),
                "email" => $request->get('email'),
                "date_naissance" => $request->get('date_naissance'),
                "sexe"  => $request->get('sexe'),
                "date_service"  => $request->get('date_service'),
                "rib"  => $request->get('rib'),
                "type_ens"  => $request->get('type_ens')
            ]);


            $enseignant->save(); // Finally, save the record.
        }
        else{
            $enseignant = new Enseignant([
                "photo" => 'notfound1.jpg',
                "nom" => $request->get('nom'),
                "prenom" => $request->get('prenom'),
                "adresse" => $request->get('adresse'),
                "cin" => $request->get('cin'),
                "telephone" => $request->get('telephone'),
                "email" => $request->get('email'),
                "date_naissance" => $request->get('date_naissance'),
                "sexe"  => $request->get('sexe'),
                "date_service"  => $request->get('date_service'),
                "rib"  => $request->get('rib'),
                "type_ens"  => $request->get('type_ens')
            ]);
            $enseignant->save(); // Finally, save the record.
        }

        $enseignant->matieres()->attach($request->matieres);

        //return view('enseignants.create');
        return redirect()->route('enseignants.index')->with(['success' => 'L\'enseignant a été bien ajouté !']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        //
        return view('enseignants.show', compact('enseignant'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        $matieres = Matiere::all();
        return view('enseignants.edit', compact('enseignant'))->with(['matieres' => $matieres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            #'adresse' => 'required',
            'cin' => 'required ',
            'telephone' => 'required ',
            'email' => 'required | email',
            'date_naissance' => 'date',
            'sexe' => 'required | in:Homme,Femme',
            #'date_service' => 'date',
            'rib' => 'required | digits:24 ',
            #'type_ens' => 'required',
        ]);
            $enseignant->update($request->all());
            return redirect()->route('enseignants.index')->with(['success' => 'L\'enseignant a été bien modifié !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
        //
    }

    public function attestation($id)
    {
        $enseignant = Enseignant::where('id', $id)->first();
        return view("enseignants.attestation")->with([
            "enseignant" => $enseignant
        ]);
    }

    public function getMatieresEns($enseignant_Id){
        $enseignant = Enseignant::Find($enseignant_Id);
        $matieres = $enseignant->matieres;
        return view('enseignants.matieres',compact('matieres'));
    }

    public function softDelete(  $id)
    {

        $enseignant = Enseignant::find($id)->delete();

        return redirect()->route('enseignants.index')
        ->with('success','L\'enseignant a été bien supprimé') ;
    }

    public function  deleteForEver(  $id)
    {

        $enseignant = Enseignant::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('enseignant.trash')
        ->with('success','L\'enseignant a été bien supprimé') ;
    }


    public function backFromSoftDelete( $id)
    {
        $enseignant = Enseignant::onlyTrashed()->where('id', $id)->first()->restore() ;
      //  dd($product);
        return redirect()->route('enseignants.index');
    }

    // public function ens_vacataire()
    // {
    //     //
    //     $enseignants = Enseignant::all();
    //     return view('enseignants.ens_vacataire')->with(['enseignants' => $enseignants]);
    // }

    public function  diplome($enseignant_Id)
    {
        $enseignant = Enseignant::Find($enseignant_Id);
        return view('diplomes.diplome',compact('enseignant'));
    }

}
