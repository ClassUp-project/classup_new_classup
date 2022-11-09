<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Statut extends model
{



    protected $fillable = [
        'statut', 'utilisateur_idutilisateur'
    ];

    protected $guarded = [];

    protected $table = 'statut';

    public $timestamps = false;

    protected $primaryKey = 'idstatut';




    public function utilisateur()
    {
        return $this->belongsToMany(Utilisateur::class, 'statut_utilisateur', 'statut_idstatut', 'utilisateur_idutilisateur');
    }


    public function groupe()
    {
        return $this->belongsToMany(Groupe::class);
    }


    public function matiereProf()
    {
        return $this->hasMany(Matiere::class);
    }

    public function questionnaire()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function ResultatEleve()
    {
        return $this->hasMany(Resultat::class, 'statut_idstatut');
    }

}
