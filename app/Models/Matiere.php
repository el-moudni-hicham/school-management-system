<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable = ["libelle", "semestre"];
    public function enseignants(){
        return $this->belongsToMany('App\Models\Enseignant','ens_matiere','matiere_id','enseignant_id');
    }
}
