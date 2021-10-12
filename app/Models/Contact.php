<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory;
    use Notifiable;
    public $fillable = ['nom', 'prenom' , 'email', 'message'];
    protected $table = 'contact';
    protected $primaryKey = 'idcontact';
    public $timestamps = false;

}
