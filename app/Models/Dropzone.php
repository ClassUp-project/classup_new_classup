<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropzone extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table = 'dropzone';

    public $timestamps = false;

    protected $primaryKey = 'iddropzone';





    public function path(){

        return url('/files' .$this->id);
     }



     public function uploadForFile(){

        return $this->belongsToMany(User::class,'image_upload_user','image_upload_id');
    }

    public function avatar(){

        return $this->belongsToMany(\App\Customer::class);
    }

    public function admin(){

        return $this->belongsTo(AccueilAdmin::class);
    }

    public function Classe()
    {
        return $this->hasMany(\App\Reception::class,'image_upload_user','image_upload_id');
    }

    public function imageToProfClasse()
    {
        return $this->hasMany(\App\ClasseMatiere::class);
    }




}
