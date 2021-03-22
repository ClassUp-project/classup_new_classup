@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->titre}}</div>

                <div class="card-body">

                    <a class="btn btn-info" href="/questionnaires/{{$questionnaire->idquestionnaire}}/questions/create"> Rajouter
                        Nouvelle Question</a>
                    <a class="btn btn-info"
                        href="/surveys/{{$questionnaire->idquestionnaire}}-{{Str::slug($questionnaire->titre)}}">répondre à
                        l'enquête</a>

                </div>
            </div>
            @foreach($questionnaire->questions as $question)

            <div class="card mt-4">
                <div class="card-header">{{$question->question}}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                        <li class="list-group-item d-flex justify-content-between">
                              <div>{{$answer->reponse}}</div>
                            @if($question->responses->count())
                             <div>{{intval(($answer->responses->count()* 100)/$question->responses->count())}}%</div>
                            @endif

                        </li>
                        @endforeach
                    </ul>
                </div>


                <div class="card-footer">
                    <form action="/questionnaires/{{$questionnaire->idquestionnaire}}/questions/{{$question->idquestion}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer la question</button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
