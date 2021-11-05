<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }} &#127774;
        </h2>
        <div class="alert-toast float-right" role="alert">
            <input type="checkbox" class="hidden" id="footertoast">
            <label class="close cursor-pointer flex items-start justify-between w-full bg-indigo-200 border-t-4 border-indigo-400 rounded-b text-teal-900 px-4 py-1 shadow-md w-80 h-10 rounded shadow-lg text-white label-alert" title="close" for="footertoast">
                @if(Auth::user()->statut == 'professeur')
                    Bonjour! Prêt à envoyer vos cours à vos élèves.
                @else
                    Hello! prêt à checker tes cours.
                @endif
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
            </label>
        </div>
    </x-slot>

    @section('content')


        <div class="container">
            <div class="row justify-content-center mt-5 d-flex">
                <div class="col-md-8">
                    <div class="card">



                        <div class="flex justify-center button-tag-home-div">
                            <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 mr-3 bg-blue-200 text-blue-700 rounded-full button-tag-home">Tous les cours</p>
                            <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 mr-3 bg-green-200 text-green-700 rounded-full button-tag-home">questionnaires</p>
                            <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-indigo-200 text-indigo-700 rounded-full button-tag-home">documents</p>
                        </div>

                        <div class="flex align-items-center content-center justify-center mt-6">
                            <div class="flex flex-wrap -mx-3 mb-6 w-56">
                                <label class="bblock uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categorie_idcategorie">Filtrez par catégorie</label>
                                    <select onchange="window.location=this.options[this.selectedIndex].value;" name="categorie_idcategorie"  class="form-select appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                        @foreach ( $categorie as $categories )
                                        <option value="/categ/{{ $categories->idcategorie }}">{{ $categories->name }}</a></option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>


                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

{{--
        <div class="flex justify-center ml-32">

                        <div class="grid grid-cols-3 divide-x divide-gray-400 mt-10 ml-48 p-8 ml-4 ">

                            <a href="/questionnaires/create" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full">Créez un nouveau questionnaire</a>

                            <a href="/images" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full">Ajouter des documents ou vidéo</a>

                            <a href="/resultat/create" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 rounded-full">Entrer des résultats par élève</a>

                        </div>

        </div>
--}}
        <div class="flex justify-center ml-40 div-card-home">

                    <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                        <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                          <div class="font-bold text-xl mb-2">La liste des derniers questionnaires</div>
                          <ul class="list-none pl-4 ">
                            @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item mt-10 ">
                                <small class="font-bold">Voir les résultats: </small><a class=" text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full" href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a><p class="text-gray-500 hover:text-gray-800">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                <div class="mt-2">

                                    <small class="font-bold">Répondre au questionnaire | Partager l'url</small>
                                    <p>
                                        <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                    </p>

                                </div>
                            </li>
                            <hr class="mt-2">
                            @endforeach
                          </ul>
                            <div class="flex items-center justify-center mt-2">
                                <a href="/toutescateg">
                                <button class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                </button>
                                </a>
                                <small class="font-bold object-bottom">plus de questionnaires</small>
                            </div>
                        </div>
                    </div>


                    <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10" id="app">
                        <img class="w-full" src="/img/paper.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                          <div class="font-bold text-xl mb-2">La liste des derniers documents</div>
                          <ul class="list-none pl-4">
                            @foreach($idFile as $document)
                            <li class="list-group-item mt-8">
                                <a class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-indigo-200 text-indigo-700 rounded-full" href="{{ route('download', Auth::user()->idutilisateur )}}" download="{{ $document->original }}">
                                    {{ Str::limit( $document->thumbnail, 35 )}}
                                </a>
                                <p class="text-gray-500 hover:text-gray-800">posté par: {{ $document->uploadForFile->prenom }} {{ $document->uploadForFile->nom }}</p>
                            </li>
                            <hr class="mt-2">
                            @endforeach
                          </ul>
                            <div class="flex items-center justify-center mt-2">
                                <button class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                </button>
                                <small class="font-bold object-bottom">plus de documents</small>
                            </div>
                        </div>
                    </div>

        </div>


                    <div class="flex justify-center mt-20 button-return-home " >
                        <a id="navigation-to-dashboard" href="/dashboard" class="ml-40 bg-blue-500 text-white font-bold py-2 px-4 pl-6 mb-10 rounded-full">Vue d'ensemble et cours</a>
                    </div>


            </div>
        </div>
    @endsection

</x-app-layout>


