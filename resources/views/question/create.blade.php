@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creation Nouveau Question</div>

                <div class="card-body">

                    <form action="/questionnaires/{{$questionnaire->idquestionnaire}}/questions" method="post">

                        @csrf


                        <div class="form-group">
                            <label for=question">Question</label>
                            <input name="question[question]" type="text" class="form-control"
                                value="{{old('question.question')}}" id="question" aria-describedby="questionHelp"
                                placeholder="Entrer une Question">
                            <small id="questionHelp" class="form-text text-muted">Posez une question simple et précise
                                pour un meilleurs résultats.</small>
                            @error('question.question')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <fieldset>

                                <legend>Les Choix</legend>
                                <small id="choiceHelp" class="form-text text-muted">Proposer des choix</small>

                                <div>

                                    <div class="form-group">
                                        <label for="reponse1">Choix 1</label>
                                        <input name="reponse[][reponse]" type="text" value="{{old('reponse.0.reponse')}}"
                                            class="form-control" id="answers1" aria-describedby="choiceHelp"
                                            placeholder="Entrer Choix 1">
                                        @error('reponse.0.reponse')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror

                                    </div>

                                </div>
                                <div>

                                    <div class="form-group">
                                        <label for="reponse2">Choix 2</label>
                                        <input name="reponse[][reponse]" type="text" value="{{old('reponse.1.reponse')}}"
                                            class="form-control" id="reponse2" aria-describedby="choiceHelp"
                                            placeholder="Entrer Choix 2">
                                        @error('reponse.1.reponse')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror

                                    </div>

                                </div>
                                <div>

                                    <div class="form-group">
                                        <label for="reponse3">Choix 3</label>
                                        <input name="reponse[][reponse]" type="text" value="{{old('reponse.2.reponse')}}"
                                            class="form-control" id="reponse3" aria-describedby="choiceHelp"
                                            placeholder="Entrer Choix 3">
                                        @error('reponse.2.reponse')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror

                                    </div>

                                </div>
                                <div>

                                    <div class="form-group">
                                        <label for="reponse">Choix 4</label>
                                        <input name="reponse[][reponse]" type="text" value="{{old('reponse.3.reponse')}}"
                                            class="form-control" id="reponse4" aria-describedby="choiceHelp"
                                            placeholder="Entrer Choix 4">
                                        @error('reponse.3.reponse')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror

                                    </div>

                                </div>

                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Rajouter Question</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
