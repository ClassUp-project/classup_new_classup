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



            <div class="flex justify-center button-tag-home-div">
                <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 mr-3 bg-blue-200 text-blue-700 rounded-full button-tag-home">Tous les cours</p>
                <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 mr-3 bg-green-200 text-green-700 rounded-full button-tag-home">questionnaires</p>
                <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-indigo-200 text-indigo-700 rounded-full button-tag-home">documents</p>
            </div>

            <div class="flex align-items-center content-center justify-center mt-6">
                <div class="flex flex-wrap -mx-3 mb-6 w-56">
                    <label class="bblock uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categorie_idcategorie">Filtrez par catégorie</label>
                        <select onchange="window.location=this.options[this.selectedIndex].value;" name="categorie_idcategorie"  class="form-select appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <option>Toutes les categories</option>
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


            <div class="flex flex-col bg-white m-auto p-auto mt-10">
                <h1 class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-gray-800">
                    Les derniers questionnaires
                </h1>
                <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                    @foreach($questionnaires as $questionnaire)
                    <div class="flex flex-nowrap lg:ml-20 md:ml-20 ml-10 ">
                            <!--Card 1-->

                            <div class="max-w-sm w-max rounded shadow-lg">
                            <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Mountain">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">
                                    <a class="bg bg-green-200 p-1 rounded-lg" href="{{$questionnaire->publicPath()}}">{{$questionnaire->titre}}</a>
                                </div>
                                <p class="text-gray-500 hover:text-gray-800">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                <small class="font-bold mt-4">Répondre au questionnaire | Partager l'url :</small>
                                <p class="text-gray-700 text-base">
                                    <div class="bg-purple-100 p-1 rounded-lg mt-2">
                                    <a href="{{$questionnaire->publicPath()}}" class="text-blue-500 hover:text-blue-700">{{$questionnaire->publicPath()}}</a>
                                    </div>
                                </p>
                            </div>
                            </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <hr class="mt-20 mb-20">

            <div class="flex flex-col bg-white m-auto p-auto mt-10">
                <h1 class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-gray-800">
                    La liste des derniers cours
                </h1>
                <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                    @foreach($idFile as $document)
                    <div class="flex flex-nowrap lg:ml-20 md:ml-20 ml-10 ">
                            <!--Card 1-->

                            <div class="max-w-sm w-max rounded shadow-lg">
                            <img class="w-full" src="/img/header.png" alt="Mountain">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">
                                    <a class="bg bg-blue-200 p-1 rounded-lg" href="{{$document->publicPath()}}">{{ $document->titre }}</a>
                                </div>
                                <p class="text-gray-500 hover:text-gray-800">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }} </p>
                                <small class="font-bold mt-4">Voir le cours | Partager l'url :</small>
                                <p class="text-gray-700 text-base">
                                    <div class="bg-purple-100 p-1 rounded-lg mt-2">
                                    <a href="{{$document->publicPath()}}" class="text-blue-500 hover:text-blue-700">{{$document->publicPath()}}</a>
                                    </div>
                                </p>
                            </div>
                            </div>

                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        @if (Auth::user()->statut == 'professeur')
            <div class="flex justify-center mt-20 pb-20 button-return-home " >
                <a id="navigation-to-dashboard" href="/dashboard" class="ml-40" ><x-button>Retour à votre tableau de bord</x-button></a>
            </div>
        @else
            <div class="flex justify-center mt-20 pb-20 button-return-home " >
                <a id="navigation-to-dashboard" href="/cours" class="ml-40"><x-button>Voir tous les cours</x-button></a>
            </div>
        @endif

    </div>

    @endsection

</x-app-layout>


