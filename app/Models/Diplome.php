<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    protected $fillable = ["enseignant_id", "file", "libelle", "theme", "taux","date_diplome"];
    public function Enseignant(){
        return $this->belongsTo('App\Models\Enseignant', 'enseignant_id');
    }
}

