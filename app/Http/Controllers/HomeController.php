<?php

namespace App\Http\Controllers;

use App\Profile;
use App\AccueilEleve;
use App\Models\Dropzone;
use App\Models\Utilisateur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $questionnaires = auth()->user()->questionnaires;

        $idFile = Dropzone::all();


        return view('home', compact('questionnaires', 'idFile'));
    }




    public function download(Dropzone $idFile, $iddropzone){


        $idFile = Dropzone::find($iddropzone);


        return Storage::disk('files')->download($idFile->original);


     }





    public function user(Utilisateur $user)
    {

       $user=auth()->user()->profile;
       return view('home', compact('user'));

    }
}
