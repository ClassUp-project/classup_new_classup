<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Utilisateur;
use App\Notifications\NewQuestionnaire;
use Illuminate\Support\Facades\Notification;

class QuestionnaireController extends Controller
{
      public function __construct()
      {
         $this->middleware('auth');
      }


    public function create(){

        $categories = Categories::all();

        return view('questionnaire.create', compact('categories'));

    }

    public function store(Request $request){

        $data = request()->validate([

                 'titre'=>'required',
                 'proposition'=>'required',
                 'description'=>'required',
                 'categorie_idcategorie'=>'required|integer',
        ]);

       $questionnaire =auth()->user()->questionnaires()->create($data);


          return redirect('/questionnaires/'.$questionnaire->idquestionnaire);
}


    public function show(Questionnaire $questionnaire)
 {
     $questionnaire->load('questions.answers.responses');

     $questionnaireSend = Utilisateur::all();

     foreach($questionnaireSend as $send)
     {
        $newQuestionnaire = [
            'prenom' => 'Salut' ,$send->prenom,
            'body' => 'Tu as un nouveau quiz à consulter',
            'actionText' => 'Bonne chance !',
            'Url' => url('/home'),
            'Consultez le questionnaire' => 'Consultez le questionnaire'
        ];
     }
        
        Notification::send($questionnaireSend, new NewQuestionnaire($newQuestionnaire));

    return view('questionnaire.show', compact('questionnaire'));
 }

}
