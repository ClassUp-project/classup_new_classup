<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReponseEnquete extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'idreponseEnquete';

    protected $table = 'reponseenquete';

    public $timestamps = false;

   public function survey()
   {
      return $this->belongsTo(App\models\Enquete::class);

   }




}
