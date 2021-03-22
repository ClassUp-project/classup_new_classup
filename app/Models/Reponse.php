<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $guarded = [];

    protected $table = 'reponse';

    public $timestamps = false;

    protected $primaryKey = 'idreponse';




    public function question()
    {

        return $this->belongsTo(Question::class);
    }


     public function responses()
     {

         return $this->hasMany(ReponseEnquete::class);

     }

}

