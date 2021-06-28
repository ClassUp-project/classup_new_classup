<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }} &#127774;
        </h2>
        <div class="bg-indigo-100 border-t-4 border-indigo-200 rounded-b text-teal-900 px-4 py-3 shadow-md w-80 float-right" role="alert">
            <div class="flex">
                <div>
                        @can('isAdmin')
                            <p class="font-bold">
                                Bonjour! Prêt à envoyer vos cours à vos élèves.
                            </p>
                        @else
                            <p class="font-bold">
                                Hello! prêt à checker tes cours.
                            <p>
                        @endcan
                </div>
            </div>
        </div>
    </x-slot>

    @section('content')


        <div class="container">
            <div class="row justify-content-center mt-5 d-flex">
                <div class="col-md-8">
                    <div class="card">



                        <div class="flex justify-center">
                            Tous les cours - questionnaires - documents
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
        <div class="flex justify-center ml-40">

                    <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                        <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                          <div class="font-bold text-xl mb-2">La liste de vos questionnaires</div>
                          <ul class="list-none pl-4 ">
                            @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item mt-10 ">
                                <a class="text-blue-800 font-bold" href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a><p class=text-black>posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                <div class="mt-2">

                                    <small class="font-bold">Share url</small>
                                    <p>
                                        <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                    </p>

                                </div>
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
                                <p class=text-black>posté par: {{ $document->uploadForFile->prenom }} {{ $document->uploadForFile->nom }}</p>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                    </div>

        </div>


                    <div class="flex justify-center mt-20 " >


                        <a href="/dashboard" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 mb-10 rounded-full">Vue d'ensemble et cours</a>


                    </div>


            </div>
        </div>
    @endsection

</x-app-layout>


