<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linscription extends Model
{

    protected $table = 'linscription';

    protected $primaryKey = 'idlinscription';


    protected $guarded = [];


    public function utilisateur()
    {

        return $this->belongsTo(Utilisateur::class);
    }



}
