<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = [
        'note', 'statut_idstatut', 'nom'
    ];

    protected $table = 'resultat';

    protected $primaryKey = 'idresultat';

    public $timestamps = false;



    public function resultatUtilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class, 'statut_idstatut');
    }


}
