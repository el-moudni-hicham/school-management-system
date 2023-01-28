<?php

namespace App\Http\Controllers;

use App\Models\Diplome;
use Illuminate\Http\Request;

class DiplomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomes = Diplome::all();
        return view('diplomes.index')->with(['diplomes'=>$diplomes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($enseignant_Id)
    {
        return view('diplomes.create', compact('enseignant_Id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $enseignant_Id)
    {

        $this->validate($request, [
            // 'file' => 'required',
            'libelle' => 'required',
            'theme' => 'required',
            'taux' => 'required',
            'date_diplome' => 'required',

        ]);
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'nullable|mimes:jpeg,bmp,png,pdf' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('diplome', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $diplome = new Diplome([
                "file" => $request->file->hashName(),
                'enseignant_id' => $enseignant_Id,
                //  'file' => $request->file,
                'libelle' => $request->libelle,
                'theme' => $request->theme,
                'taux' => $request->taux,
                'date_diplome' => $request->date_diplome
            ]);

            $diplome->save(); // Finally, save the record.
        }
        else{
            $diplome = new Diplome([

                'enseignant_id' => $enseignant_Id,
                //  'file' => $request->file,
                'libelle' => $request->libelle,
                'theme' => $request->theme,
                'taux' => $request->taux,
                'date_diplome' => $request->date_diplome
            ]);
            $diplome->save(); // Finally, save the record.
        }
        // Diplome::create([
            //     'enseignant_id' => $enseignant_Id,
            //     //  'file' => $request->file,
            //     'libelle' => $request->libelle,
            //     'theme' => $request->theme,
            //     'taux' => $request->taux,
            //     'date_diplome' => $request->date_diplome

            // ]);
            //return redirect()->back();
            // return redirect()->route('enseignants.index');
            return redirect()->route('enseignants.index')->with(['success' => 'Le diplome a été bien ajouté !']);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Diplome  $diplome
         * @return \Illuminate\Http\Response
         */
        public function show(Diplome $diplome)
        {
            //
            return view('diplomes.show',compact('diplome'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Diplome  $diplome
         * @return \Illuminate\Http\Response
         */
        public function edit(Diplome $diplome)
        {
            //
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diplome $diplome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diplome $diplome)
    {
        //
    }
    public function diplome($enseignant_Id)
    {
        $diplomes = Diplome::where('enseignant_id',$enseignant_Id);
        return view('diplomes.diplome', compact('diplomes'));
    }
}

