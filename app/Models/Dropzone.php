<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropzone extends Model
{
    use HasFactory;

    protected $fillable = [
        'original',
        'thumbnail'
    ];

    protected $guarded=[];

    protected $table = 'dropzone';

    //public $timestamps = false;

    protected $primaryKey = 'iddropzone';





    public function path(){

        return url('/dropzone' .$this->iddropzone);
     }



     public function uploadForFile(){

        return $this->belongsToMany(\App\Models\Utilisateur::class,'dropzone_iddropzone');
    }





}
