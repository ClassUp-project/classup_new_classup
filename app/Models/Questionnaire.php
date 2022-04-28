<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Questionnaire extends Model
{
     use Notifiable;

     protected $guarded =[];

     protected $table = 'questionnaire';

     public $timestamps = false;

     protected $primaryKey = 'idquestionnaire';



     public function path()
     {

     return url ('/questionnaires/'.$this->idquestionnaire);

     }

     public function publicPath()
     {

     return url('/surveys/' .$this->idquestionnaire. '-'. Str::slug($this->titre));

     }


     public function user()
     {

          return $this->belongsTo(Utilisateur::class,'utilisateur_idutilisateur');


     }

     public function questions(){

         return $this->hasMany(Question::class);
     }


        public function surveys()
        {
              return $this->hasMany(Enquete::class);

        }


        public function reponseEnquete()
   {
      return $this->hasMany(ReponseEnquete::class);

   }


   public function professeur()
    {
        return $this->belongsTo(Statut::class);
    }


    public function questionnaire()
    {
        return $this->belongsTo(Groupe::class);
    }


    public function categ()
    {
        return $this->belongsTo(Categories::class, 'categorie_idcategorie');
    }

    public function drop()
    {
        return $this->hasMany(Dropzone::class);
    }




}
