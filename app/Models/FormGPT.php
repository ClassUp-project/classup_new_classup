<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormGPT extends Model
{
    use HasFactory;

    protected $table = 'aigenerate';

    protected $primaryKey = 'idmessage';

    protected $guarded = [];

    public $timestamps = false;

    public $fillable = [
        'message',
        'utilisateur_idutilisateur',
    ];

    public function AigenerateUtilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
