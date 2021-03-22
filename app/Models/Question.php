<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $guarded = [];

  protected $table = 'question';

  protected $primaryKey = 'idquestion';

  public $timestamps = false;

    public function questionnaire(){

        return $this->belongsTo(Questionnaire::class);
    }

    public function answers()
    {

           return $this->hasMany(Reponse::class);
    }

    public function responses()
    {
        return $this->hasMany(ReponseEnquete::class);

    }
    
}
