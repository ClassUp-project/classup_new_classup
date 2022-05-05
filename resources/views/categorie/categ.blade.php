<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Les cours dans cette catégorie') }} &#127774;
        </h2>

    </x-slot>

    @section('content')

    <div class="flex justify-left items-center bg-gray-200 h-full allcateg-return-categ">
        <a href="{{ route('toutescateg') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: royalblue; margin-left: 50px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </a>
    </div>


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
                            <h1 class="text-xl font-bold">
                                @if ($categ->name == 'Mathématique')
                                Prêt à choper la bosse des {{ $categ->name }} ?
                                @elseif ($categ->name == 'Français')
                                Prêt à devenir un boss en {{ $categ->name }} ?
                                @elseif ($categ->name == 'Histoire')
                                Rejoins les grand.e.s de l'{{ $categ->name }} !
                                @elseif ($categ->name == 'Géographie')
                                Prends un sac, on part à la découverte ! vive la {{ $categ->name }}
                                @elseif ($categ->name == 'Science')
                                Rivalises avec les scientifiques de l'histoire ! vive la {{ $categ->name }}
                                @endif
                            </h1>
                        </div>

                        @if (count($questionnaires) > 0)
                            <div class="flex justify-center ml-40 div-card-home-categ">
                                @foreach($questionnaires as $questionnaire)
                                        <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10 div-card-home-categ-categ">
                                            <img class="w-full" src="/img/questionnaire-en-ligne.jpg" alt="Sunset in the mountains">
                                            <div class="px-6 py-4">

                                                <div class="font-bold text-xl mb-2">Questionnaire</div>
                                                                <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-green-700 rounded-full">objet: {{ $questionnaire->proposition }}</p>
                                                                | <p class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-red-200 text-green-700 rounded-full float-right">categ: {{ $questionnaire->categ->name }}</p>
                                                                <p class="text-red-800 hover:text-red-800 mt-2">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                                                <small class="font-bold mt-2">voir les resultats du questionnaire : </small>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: right; margin-right:90px;">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                                                </svg>
                                                                    <a class=" text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full mr-40 " href="{{$questionnaire->path() }}">
                                                                        {{$questionnaire->titre}}
                                                                    </a>
                                                                <small class="font-bold mt-2">description du questionnaire : </small>
                                                                <p class="">{{ $questionnaire->description }}</p>

                                                            <div class="mt-2">
                                                                <hr>

                                                                <div class="mt-2">
                                                                    <div class="text-center">
                                                                    <small class="font-bold">Partager l'URL | Répondre </small>
                                                                    </div>
                                                                    <div class="flex items-center justify-center" role="success">
                                                                        <button onclick="share()" url-site="{{$questionnaire->publicPath()}}" data-bs-original-title="Copy Url" class="btn text-blue-500 link-copy">
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
                                                            </div>
                                                </div>

                                        </div>
                                @endforeach
                            </div>

                        @else
                        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md max-w-xl flex justify-center items-center mt-20" role="alert">
                            <div class="flex justify-center">
                              <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                              <div>
                                <h1>il n'y a rien</h1>
                              </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endsection

</x-app-layout>

<script src="{{asset('js/share_link.js')}}"></script>

<script src="{{asset('js/alert.js')}}"></script>
