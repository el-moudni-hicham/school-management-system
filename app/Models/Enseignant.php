<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enseignant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["photo", "nom", "prenom","adresse","cin","telephone","email","date_naissance","sexe","date_service","rib"];
    protected $dates = ['deleted_at'];
    public function matieres(){
        return $this->belongsToMany('App\Models\Matiere','ens_matiere','enseignant_id','matiere_id');
    }

    public function Diplomes(){
        return $this->hasMany(Diplome::class);
    }

}
