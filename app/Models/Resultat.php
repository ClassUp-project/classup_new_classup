<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'note', 'idprofesseur',
    ];

    protected $table = 'resultat';

    protected $primaryKey = 'idresultat';

    public $timestamps = false;



    public function resultatUtilisateur(){

        return $this->belongsTo(Utilisateur::class);
    }


}
