<?php

namespace App\Http\Controllers;
use App\Models\Eleve;
use App\Models\Groupe;
use App\Models\Matiere;
use App\Models\Professeur;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;



class EleveController extends Controller
{
    public function __construct()
      {
         $this->middleware('auth');
      }


      public function create(){


        return view('choix-classe-eleve.create');

    }



    public function storeEleve(){

        $data = request()->validate([

            'nom'=>'required',
            'prenom'=>'required',
        ]);
        $eleveSubscribeByProf = Auth::user()->utilisateur()->create($data);

        return redirect('/dashboard/', compact('eleveSubscribeByProf'));

    }



    public function show($idutilisateur){

        $groupe = auth()->user()->groupe;

        $matiere = auth()->user()->matiere;



        return view('choix-classe-eleve.show', compact('groupe','matiere'));
    }











}
