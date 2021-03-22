<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $guarded = [];

    protected $table = 'matiere';

    public $timestamps = false;

    protected $primaryKey = 'idmatiere';

    protected $fillable = ['lintitule'];


    public function groupeMatiere()
    {

        return $this->belongsToMany(App\models\Groupe::class);
    }

    public function profMatiere()
    {
        return $this->belongsTo(App\models\Professeur::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(App\models\Utilisateur::class);
    }

    public function eleve()
    {
        return $this->belongsTo(App\models\Eleve::class);
    }






}
