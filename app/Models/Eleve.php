<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'eleve',
    ];

    protected $guarded = [];

    protected $table = 'eleve';

    public $timestamps = false;

    protected $primaryKey = 'ideleve';




     public function utilisateur()
     {

         return $this->belongsToMany(App\models\Utilisateur::class,'eleve_utilisateur');

     }



     public function groupe()
     {
         return $this->hasMany(Groupe::class);
     }

     public function matiere()
     {
         return $this->hasMany(Matiere::class);
     }


}
