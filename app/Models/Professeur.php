<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Professeur extends model
{



    protected $fillable = [
        'professeur',
    ];

    protected $guarded = [];

    protected $table = 'professeur';

    public $timestamps = false;

    protected $primaryKey = 'idprofesseur';




    public function utilisateur()
    {

        return $this->belongsToMany(App\models\Utilisateur::class, 'professeur_utilisateur' );
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
