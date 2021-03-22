@extends('layouts.app')

@section('content')

<h2>Eleve : {{ Auth::user()->nom }}</h2>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="row justify-content-center">

                <div class="card mt-5" style="width: 18rem;">

                    <img class="card-img-top bg-primary" style="width:35px; height:35px;" src="https://img.icons8.com/dusk/64/000000/survey.png" alt="questionnaire">
                    <div class="card-body" style="height:10px;">
                    <h5 class="card-text"><strong>Toutes mes classes</strong></h5>
                    </div>
                    <hr>
                    <ul class="list-group list-group-flush">
                        @foreach ($groupe as $groupes)
                            <h1>{{$groupes->nom}}</h1>
                        @endforeach
                    </ul>

                </div>


                <div class="card ml-4 mt-5" style="width: 18rem;">

                    <img class="card-img-top bg-primary" style="width:35px; height:35px;" src="https://img.icons8.com/dusk/64/000000/survey.png" alt="questionnaire">
                    <div class="card-body" style="height:10px;">
                    <h5 class="card-text"><strong>Toutes mes matières</strong></h5>
                    </div>
                    <hr>
                    <ul class="list-group list-group-flush">
                        @foreach ($matiere as $matieres)
                        <h1>{{$matieres->lintitule}}</h1>
                        @endforeach
                    </ul>

                </div>

        </div>

            <div class="row justify-content-center">
                <a href="{{ url('/eleves/create') }}">
                    @csrf
                        <button type="submit" class="btn btn-primary mt-4 ml-2">Rajouter une classe et une matière</button>
                </form>
            </div>

            <div class="row justify-content-center">
                <a href="/home">
                    @csrf
                        <button type="submit" class="btn btn-primary mt-4 ml-2">Aller sur mon tableau de bord</button>
                </a>
            </div>
    </div>
</div>


