<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} &#128187;
        </h2>
        <div class="alert-toast float-right" role="alert">
            <input type="checkbox" class="hidden" id="footertoast">
            <label class="close cursor-pointer flex items-start justify-between w-full bg-indigo-200 border-t-4 border-indigo-400 rounded-b text-teal-900 px-4 py-1 shadow-md w-80 h-10 rounded shadow-lg text-white label-alert" title="close" for="footertoast">
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




            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>


            <div class="flex justify-center ml-32 button-tag-dashboard-div">

                            <div class="grid grid-cols-3 divide-x divide-gray-400 mt-10 ml-48 p-8 ml-4 button-tag-dashboard-div-align">

                                <a id="navigation-to-dashboard" href="/questionnaires/create" class="bg-green-500 hover:bg-green-700 text-white ml-8 py-2 px-4 rounded inline-flex items-center button-tag-dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                    Créer un nouveau quiz
                                </a>

                                <a id="navigation-to-dashboard" href="{{ route('telechargement') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white py-2 px-4 rounded inline-flex ml-8 pl-6 items-center button-tag-dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                    Créer un cours
                                </a>

                                <a id="navigation-to-dashboard" href="/resultat/create" class="bg-pink-500 hover:bg-pink-700 text-white py-2 px-4 rounded inline-flex ml-8 pl-6 items-center button-tag-dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                    Entre un résultat élève
                                </a>

                            </div>

            </div>

            <div class="flex ml-52 justify-center items-center count-cards-div">
                <div class="w-full md:w-1/2 xl:w-1/3 p-6 count-cards">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total de vos questionnaires</h2>
                            <p class="font-bold text-3xl">{{ $questionnaires->count() }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">nbrs de cours partagés</h2>
                                <p class="font-bold text-3xl">{{ $idFile->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total des notes attribuées</h2>
                                <p class="font-bold text-3xl">{{ $resultat->count() }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>

            <div class="flex justify-center ml-40 pb-40 div-card-home">

                        <!--LISTE QUESTIONNAIRES-->
                    <div class="flex flex-col bg-white max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                        <h2 class="flex py-5 lg:px-2 md:px-5 px-5 md:mx-10 mx-5 font-bold text-3xl text-gray-800">
                            La liste de vos quiz
                        </h2>
                        <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                        <div class="overflow-y-scroll h-80 justify-center items-center">
                            @foreach($questionnaires as $questionnaire)
                            <div class="flex flex-nowrap justify-center items-center">
                                    <!--Card 1-->

                                    <ul class="list-none pl-4 ">
                                        <li class="list-group-item mt-6 ">
                                            <div class="text-center">
                                            <small class="font-bold">Voir les résultats au questionnaire :</small><a class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full" href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <small class="font-bold">Partager l'URL | Répondre </small>
                                                <div class="flex items-center justify-center">
                                                    <button onclick="share()" role="tooltip" id="tooltipButton" type="button" url-site="{{$questionnaire->publicPath()}}" data-bs-original-title="Copy Url" data-clipboard-text="c'est copié !" class="btn text-blue-500 link-copy" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 10px; color:gray">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                        </svg>
                                                    </button>

                                                    <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 10px; margin-left: 50px; color:gray">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-center mt-6">
                                            <form action="/dashboard/{{$questionnaire->idquestionnaire}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 mt-2 rounded-full w-30 h-6" style="font-size: 12px;">Supprimer</button>
                                            </form>
                                            </div>
                                        </li>
                                        <hr class="mt-4">
                                    </ul>

                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!--LISTE DOCUMENTS-->
                    <div class="flex flex-col bg-white max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                        <h2 class="flex py-5 lg:px-2 md:px-5 px-5 md:mx-10 mx-5 font-bold text-3xl text-gray-800">
                            La liste de vos cours et documents joints
                        </h2>
                        <img class="w-full" src="/img/header.png" alt="Sunset in the mountains">
                        <div class="overflow-y-scroll h-80 justify-center items-center">
                            <ul class="list-none pl-4">
                                @foreach($idFile as $document)
                                <li class="list-group-item mt-8">
                                    <a href="{{route('cours_details', $document->iddropzone)}}" class="underline mb-4 font-bold">{{ $document->titre }}</a>
                                    <p class="mt-4 italic">document attaché au cours :</p>
                                    @if($document->original)
                                    <a class="mt-5 text-blue-800 font-bold bg-purple-100 p-1 rounded-lg mt-2" href="{{ route('download', Auth::user()->idutilisateur )}}" download="{{ $document->original }}">
                                        {{ Str::limit( $document->thumbnail, 35 )}}
                                    </a>
                                    @else
                                    <p class="bg-yellow-200 w-26 p-1 rounded-lg">pas de doc</p>
                                    @endif
                                    <div class="mt-2 text-center">
                                        <small class="font-bold">Partager l'URL </small>
                                        <div class="flex items-center justify-center">
                                            <button onclick="share()" role="tooltip" id="tooltipButton" type="button" url-site="{{$document->publicPath()}}" data-bs-original-title="Copy Url" data-clipboard-text="c'est copié !" class="btn text-blue-500 link-copy" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 10px; color:gray">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <form action="/filedelete/{{$document->iddropzone}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 mt-4 rounded-full w-20 h-5" style="font-size: 12px;">Supprimer</button>
                                    </form>
                                </li>
                                <hr class="mt-4">
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!--LISTE RESULTATS-->
                    <div class="flex flex-col bg-white max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                        <h2 class="flex py-5 lg:px-2 md:px-5 px-5 md:mx-10 mx-5 font-bold text-3xl text-gray-800">
                            La liste des résultats
                        </h2>
                        <img class="w-full" src="/img/board-note.jpg" alt="Sunset in the mountains">
                        <div class="overflow-y-scroll h-80 justify-center items-center">
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
                                <hr class="mt-4">
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            </div>




     </div>
    </div>
</div>
@endsection

</x-app-layout>

<script src="{{asset('js/share_link.js')}}" type="text/javascript"></script>

<script src="{{asset('js/alert.js')}}" type="text/javascript"></script>
