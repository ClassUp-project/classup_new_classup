<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categorie';

    protected $primaryKey = 'idcategorie';

    public $timestamps = false;

    protected $fillable = ['parent_id', 'name'];


    public function path()
     {

     return url ('/questionnaires/'.$this->idquestionnaire);

     }

     public function publicPath()
     {

     return url('/surveys/' .$this->idquestionnaire. '-'. Str::slug($this->titre));

     }




    public function children()
  {
    return $this->hasMany(Categories::class, 'parent_id');
  }

  public function questionnaire_categ()
  {
      return $this->hasMany(Questionnaire::class,'categorie_idcategorie');
  }

  public function user()
  {
      return $this->belongsTo(Utilisateur::class);
  }


}
