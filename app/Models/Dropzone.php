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
        'original',
        'thumbnail',
        'utilisateur_idutilisateur',
    ];

    protected $guarded=[];

    protected $table = 'dropzone';

    //public $timestamps = false;

    protected $primaryKey = 'iddropzone';



    public function path(){

        return url('/files' .$this->iddropzone);
     }



     public function uploadForFile(){

        return $this->belongsTo(Utilisateur::class,'utilisateur_idutilisateur');
    }


    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }





}
