<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Utilisateur extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'statut', 'email', 'password',
    ];

    protected $table = 'utilisateur';

    protected $primaryKey = 'idutilisateur';

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);

    }

    public function matiere()
    {
        return $this->hasMany(Matiere::class);

    }


    public function linscription()
    {
        return $this->hasOne(Linscription::class);
    }


    /*
    public function professeur()
    {
        return $this->hasone(Professeur::class);
    }
    */

    /*
    public function eleve()
    {
        return $this->hasOne(Eleve::class);
    }
    */

    public function groupe()
    {
        return $this->hasMany(Groupe::class);
    }


    public function professeur(){

        return $this->belongsToMany(Professeur::class, 'professeur_utilisateur','utilisateur_idutilisateur');
    }

    public function eleve(){

        return $this->belongsToMany(Eleve::class, 'eleve_utilisateur');
    }




    public function imageFileUpload(){

        return $this->hasMany(Dropzone::class);
    }

    public function resultat(){

        return $this->hasMany(Resultat::class);
    }


    public function dashboard()
    {
        return $this->hasMany(Dashboard::class);
    }




}
