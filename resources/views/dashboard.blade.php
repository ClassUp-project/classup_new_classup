<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} &#128187;
        </h2>


        <div class="alert-toast float-right" role="alert">
            <input type="checkbox" class="hidden" id="footertoast">
            <label class="close cursor-pointer flex items-start justify-between w-full bg-indigo-200 border-t-4 border-indigo-400 rounded-b text-teal-900 px-4 py-1 shadow-md w-80 h-10 rounded shadow-lg text-white" title="close" for="footertoast">
                @if(Auth::user()->statut == 'professeur')
                    Bonjour! Prêt à envoyer vos cours à vos élèves.
                @else
                    Hello! prêt à checker tes cours.
                @endif
                    <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
            </label>
        </div>
    </x-slot>

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-5 d-flex">
            <div class="col-md-8">
                <div class="display-flex justify-center text-left ml-80 title-dashboard">
                    <h1 class="text-xl font-bold ">Votre espace personnel de gestion<br> de vos cours</h1>
                </div>
                <div class="card">



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>


    <div class="flex justify-center ml-32 button-tag-dashboard-div">

                    <div class="grid grid-cols-3 divide-x divide-gray-400 mt-10 ml-48 p-8 ml-4 button-tag-dashboard-div-align">

                        <a id="navigation-to-dashboard" href="/questionnaires/create" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full button-tag-dashboard">Créez un nouveau questionnaire</a>

                        <a id="navigation-to-dashboard" href="/images" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full button-tag-dashboard">Ajouter des documents ou vidéo</a>

                        <a id="navigation-to-dashboard" href="/resultat/create" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full button-tag-dashboard">Entrer des résultats par élève</a>

                    </div>

    </div>

    <div class="flex justify-center ml-40 pb-40 div-card-home">

                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                    <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">La liste de vos questionnaires</div>
                      <ul class="list-none pl-4 ">
                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item mt-10 ">
                            <a class="text-blue-800 font-bold" href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a>
                            <div class="mt-2">

                                <small class="font-bold">Share url</small>
                                <p>
                                    <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                </p>

                            </div>
                            <form action="/dashboard/{{$questionnaire->idquestionnaire}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 mt-2 rounded-full w-30 h-6" style="font-size: 12px;">Supprimer</button>
                            </form>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </div>


                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10" id="app">
                    <img class="w-full" src="/img/paper.jpg" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">La liste de vos documents</div>
                      <ul class="list-none pl-4">
                        @foreach($idFile as $document)
                        <li class="list-group-item mt-8">
                            <a class="text-blue-800 font-bold" href="{{ route('download', Auth::user()->idutilisateur )}}" download="{{ $document->original }}">
                                {{ Str::limit( $document->thumbnail, 35 )}}
                            </a>
                            <form action="/filedelete/{{$document->iddropzone}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 mt-2 rounded-full w-20 h-5" style="font-size: 12px;">Supprimer</button>
                            </form>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </div>


                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10" id="app">
                    <img class="w-full" src="/img/board-note.jpg" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">La liste des résultats</div>
                      <ul class="list-none pl-4">
                        @foreach($resultat as $resultats)
                        <li class="list-group-item mt-8">
                            <p class="text-blue-800 font-bold">
                                {{ $resultats->nom }} | {{ $resultats->note }}
                            </p>
                            <form action="/notedelete/{{$resultats->idresultat}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 mt-2 rounded-full w-20 h-5" style="font-size: 12px;">Supprimer</button>
                            </form>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </div>

    </div>




        </div>
    </div>
@endsection
</x-app-layout>
