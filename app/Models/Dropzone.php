<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dropzone extends Model
{

    use HasFactory, Notifiable;


    protected $fillable = [
        'titre',
        'description',
        'original',
        'thumbnail',
        'questionnaire_idquestionnaire',
        'utilisateur_idutilisateur',
    ];

    protected $guarded=[];

    protected $table = 'dropzone';

    //public $timestamps = false;

    protected $primaryKey = 'iddropzone';



    public function path(){

        return url('/files' .$this->iddropzone);
     }

    public function publicPath(){

        return url('/cours_details/' .$this->iddropzone. '-'. Str::slug($this->titre));
    }



     public function uploadForFile(){

        return $this->belongsTo(Utilisateur::class,'utilisateur_idutilisateur');
    }


    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }

    public function questionnaireid()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_idquestionnaire');
    }




}
