<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

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
                 'categorie_idcategorie'=>'required|integer',
        ]);

       $questionnaire =auth()->user()->questionnaires()->create($data);


          return redirect('/questionnaires/'.$questionnaire->idquestionnaire);
}


    public function show(Questionnaire $questionnaire)
 {
     $questionnaire->load('questions.answers.responses');

    //dd($questionnaire);

    return view('questionnaire.show', compact('questionnaire'));
 }

}
