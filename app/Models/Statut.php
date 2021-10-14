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

        return $this->belongsToMany(App\models\Utilisateur::class, 'statut_utilisateur', 'statut_idstatut' );
    }




    public function groupe()
    {
        return $this->belongsToMany(App\models\Groupe::class);
    }


    public function matiereProf()
    {
        return $this->hasMany(App\models\Matiere::class);
    }

    public function questionnaire()
    {
        return $this->hasMany(App\models\Questionnaire::class);
    }










}
