@extends('layouts.app')



@section('content')


<div class="container">
    <div class="row justify-content-center mt-5 d-flex">
        <div class="col-md-8">
            <div class="card">



                <div class="card-header text-center text-primary font-weight-bold">Que souhaitez vous faire</div>



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                   <div class=" d-flex justify-content-around ">

                    <a href="/questionnaires/create" class="btn btn-primary p-2 m-2 rounded-pill">Créez un nouveau questionnaire</a>

                    <a href="/images" class="btn btn-primary p-2 m-2 rounded-pill">Ajouter des documents ou vidéo</a>

                    <a href="/graphs/create" class="btn btn-primary p-2 m-2 rounded-pill">Entrer des résultats par élève</a>

                   </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-center font-weight-bold text-primary">Vos cours déjà créés</div>

                     <ul class="list-group">

                        @foreach($questionnaires as $questionnaire)

                           <li class="list-group-item">

                           <a href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a>

                           <div class="mt-2">

                            <small class="font-weight-bold">Share url</small>
                            <p>
                                <a href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                            </p>

                           </div>


                           </li>

                        @endforeach

                     </ul>


                <div class="card-body">


                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-center font-weight-bold text-primary">Vos documents</div>

                     <ul class="list-group">

                        @foreach($idFile as $document)

                           <li class="list-group-item">
                                <a href="{{ route('download', $document->iddropzone)}}" download="{{ $document->original }}">
                                    {{ Str::limit( $document->thumbnail, 35 )}}
                                </a>
                           </li>

                        @endforeach

                     </ul>


                <div class="card-body">


                </div>
            </div>


            <div class="card-body  d-flex justify-content-around " >


                <a href="/accueil" class="badge badge-pill badge-danger h-50 p-3">Vue d'ensemble et cours</a>


            </div>
        </div>

    </div>
</div>
@endsection
