<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Statut;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultatController extends Controller
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


    public function create()
    {
        $utilisateur = Statut::with('utilisateur')->where('statut','=','eleve')->get();

        return view('resultat.create', compact('utilisateur'));

    }


    public function store()
    {
        $data = request()->validate([
            'note'=>'required',
            'statut_idstatut'=>'required|integer'
        ]);

        $resultat = auth()->user()->resultat()->create($data);

        return redirect('/resultat/'.$resultat->idresultat);
    }


    public function show()
    {

        $resultats = auth()->user()->resultat;

        return view('resultat.show', compact('resultats'));
    }
    

    public function show_detail($idresultat)
    {
        $resultats = Resultat::where('statut_idstatut',$idresultat)->get();

       return view('resultat.detail_resultat', compact('idresultat','resultats'));
    }



}
