<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
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

          return $this->belongsTo(Utilisateur::class);


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
        return $this->belongsTo(Professeur::class);
    }


    public function questionnaire()
    {
        return $this->belongsTo(Groupe::class);
    }




}
