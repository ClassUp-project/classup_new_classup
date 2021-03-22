@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{$questionnaire->titre}}</h1>

            <form action="/surveys/{{$questionnaire->idquestionnaire}}-{{Str::slug($questionnaire->titre)}}" method="post">
                @csrf
                @foreach ($questionnaire->questions as $key => $question)

                <div class="card mt-4">
                    <div class="card-header"><strong class="text-primary">{{ $key + 1 }}</strong>
                        {{$question->question}}</div>

                    <div class="card-body">

                        @error('reponse.'. $key. '.reponse_idreponse')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <ul class="list-group">
                            @foreach($question->answers as $answer)

                            <label for="reponse{{$answer->idreponse}}">
                                <li class="list-group-item list-group-item-action list-group-item-light ">
                                    <input type="radio" name="reponse[{{$key}}][reponse_idreponse]" id="reponse{{$answer->idreponse}}"
                                        {{(old('reponse.'. $key. '.reponse_idreponse') ==$answer->idreponse)? 'checked': ''}}
                                        class="mr-2" value="{{ $answer->idreponse}}">
                                    {{ $answer->reponse}}

                                    <input type="hidden" name="reponse[{{$key}}][question_idquestion]"
                                        value="{{$question->idquestion}}">
                                </li>
                            </label>

                            @endforeach
                        </ul>
                    </div>
                </div>

                @endforeach


                <div class="card mt-4">
                    <div class="card-header">Vos Informations</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Votre Nom</label>
                            <input name="enquete[nom]" type="text" class="form-control" id="nom"
                                aria-describedby="nomHelp" placeholder="Entrer votre Nom">
                            <small id="nomHelp" class="form-text text-muted">Salut quel est ton nom?</small>
                            @error('nom')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="email">Votre Email</label>
                            <input name="enquete[email]" type="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Entrer un Email">
                            <small id="emailHelp" class="form-text text-muted">Quel est ton email?</small>

                            @error('email')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-secondary" type="submit">Question complète</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
