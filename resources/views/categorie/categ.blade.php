<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Les cours dans cette catégorie') }} &#127774;
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


                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-center ml-40 mt-10 titre-categ">
                            <h1 class="text-xl font-bold">Tous les questionnaires dans la catégorie {{ $categ->name }}</h1>
                        </div>
                            <div class="flex justify-center ml-40 div-card-home">
                                @foreach($questionnaires as $questionnaire)
                                        <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
                                            <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                                            <div class="px-6 py-4">
                                                <div class="font-bold text-xl mb-2">Questionnaire</div>
                                                        <a class=" text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full" href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a>
                                                                | <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-green-700 rounded-full">objet: {{ $questionnaire->proposition }}</p>
                                                                | <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 mt-1 bg-red-200 text-green-700 rounded-full">categ: {{ $questionnaire->categ->name }}</p>
                                                                <p class="text-gray-500 hover:text-gray-800 mt-1">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                                            <div class="mt-2">
                                                                <small class="font-bold">Share url</small>
                                                                <p>
                                                                    <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                                                </p>
                                                            </div>
                                                </div>

                                        </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

</x-app-layout>
