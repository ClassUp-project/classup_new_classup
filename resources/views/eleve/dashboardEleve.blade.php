@extends('layouts.app')


@can('manage-users')
<a class="dropdown-item" href="{{route('admin.users.index')}}">User Management</a>
@endcan

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card mt-4">
                <div class="card-header">
            <h3 style="text-align:center; color:royalblue"><strong>Vos cours et travaux à réaliser. Good job ;)</strong></h3>
                </div>
            </div>









            <div class="card mt-4">
                <div class="card-header">Vos questionnaires en cours</div>

                     <ul class="list-group">

                        @foreach($eleve as $questionnaire)

                           <li class="list-group-item">

                           <p>{{$questionnaire->acronyme}}</p>
                           <p>{{$questionnaire->titre}}</p>
                           <p>{{$questionnaire->prenom }}</p>


                           <div class="mt-2">

                            <small class="font-weight-bold">Partagez le lien</small>
                            <p>

                            </p>



                           </div>


                           </li>

                        @endforeach

                     </ul>

            </div>







            <div class="card-body">

                <a href="/accueileleve" >
                    <button type="button" class="btn btn-outline-primary">
                    <strong>
                    Vers ma tool box <img src="https://img.icons8.com/nolan/64/toolbox.png" style="width:45px; height:45px;"/>
                    </strong>
                    </button>
                </a>

            </div>

        </div>
    </div>
</div>
@endsection
