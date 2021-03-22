<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;


class EnqueteController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)

    {
                // dd(request()->all());

         $data=request()->validate([

                   'reponse.*.reponse_idreponse'=>'required',
                   'reponse.*.question_idquestion' => 'required',
                   'enquete.nom'=>'required',
                   'enquete.email'=>'required|email',
          ]);

                    $survey=$questionnaire->surveys()->create($data['enquete']);
                    $survey->responses()->createMany($data['reponse']);


                     return view('survey.merci');

    }

    public function merci(){

    }
}
