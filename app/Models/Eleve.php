<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'nom', 'prenom'
    ];

    protected $guarded = [];

    protected $table = 'eleve';

    public $timestamps = false;

    protected $primaryKey = 'ideleve';




     public function utilisateur()
     {
         return $this->belongsTo(Utilisateur::class);
     }



     public function groupe()
     {
         return $this->hasMany(Groupe::class);
     }

     public function matiere()
     {
         return $this->hasMany(Matiere::class);
     }

     public function ResultatEleve()
    {
        return $this->hasMany(Resultat::class, 'eleve_ideleve' );
    }


}
