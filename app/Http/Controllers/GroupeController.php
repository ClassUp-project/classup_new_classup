<?php

namespace App\Http\Controllers;
use App\Models\Eleve;
use App\Models\Groupe;
use App\Models\Matiere;
use App\Models\Professeur;
use App\Models\Questionnaire;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;



class GroupeController extends Controller
{
    public function __construct()
      {
         $this->middleware('auth');
      }


      public function create(){


        return view('choix-classe.create');

    }



    public function store(){


        $professeur = Professeur::where('professeur','idprofesseur')->get();


        $data = request()->validate([

            'nom'=>'required',
            'acronyme'=>'required',
        ]);
        $groupeClasse = Auth::user()->groupe()->create($data);

        $data = request()->validate([

            'lintitule'=>'required',
        ]);
        $matiere = Auth::user()->matiere()->create($data);



        return redirect('/maclasses/'.$groupeClasse->idgroupe)->with(compact('matiere'));


    }



    public function show($idutilisateur){



        $groupe = auth()->user()->groupe;

        $matiere = auth()->user()->matiere;

        $questionnaires = Questionnaire::all();



        return view('choix-classe.show', compact('groupe','matiere','questionnaires'));
    }











}
