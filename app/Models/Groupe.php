<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $table = 'groupe';

    protected $primaryKey = 'idgroupe';

    protected $guarded = [];

    public $timestamps = false;

    protected $fillable = ['nom', 'acronyme','professeur_idprofesseur','utilisateur_idutilisateur'];


    public function professeur()
    {

        return $this->belongsToMany(App\models\Professeur::class);
    }


    public function matiere()
    {

        return $this->belongsToMany(App\models\Matiere::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(App\models\Utilisateur::class);
    }

    public function eleve()
    {
        return $this->belongsTo(App\models\Eleve::class);
    }

    public function questionnaire()
    {
        return $this->hasMany(App\models\Questionnaire::class);
    }



}
