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
                                                                <p class="text-gray-500 hover:text-gray-800 mt-2">posté par: {{ $questionnaire->user->prenom }} {{ $questionnaire->user->nom }}</p>
                                                                <small class="font-bold mt-2">voir les resultats du questionnaire : </small><a class=" text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full mr-40 " href="{{$questionnaire->path() }}">{{$questionnaire->titre}}</a>
                                                                <small class="font-bold">Répondre au questionnaire :</small><a class=" text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-indigo-200 text-green-700 rounded-full mr-40" href="{{$questionnaire->publicPath()}}">{{$questionnaire->titre}}</a>
                                                            <div class="mt-2">
                                                                <small class="font-bold">Partager l'url</small>
                                                                <p>{{$questionnaire->publicPath()}}</p>
                                                                <hr>
                                                                <div class="flex items-center justify-center">
                                                                <a class="text-blue-500" href="{{$questionnaire->publicPath()}}">
                                                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                        width="25px" height="25px" viewBox="0 0 1280.000000 1081.000000"
                                                                        preserveAspectRatio="xMidYMid meet" style="margin-top: 10px">
                                                                        <g transform="translate(0.000000,1081.000000) scale(0.100000,-0.100000)"
                                                                        fill="grey" stroke="none" margin-top="20px">
                                                                        <path d="M12675 10770 c-215 -75 -521 -182 -575 -200 -30 -10 -147 -51 -260
                                                                        -90 -113 -39 -230 -80 -260 -90 -56 -19 -134 -46 -490 -170 -113 -39 -230 -80
                                                                        -260 -90 -30 -10 -147 -51 -260 -90 -113 -39 -230 -80 -260 -90 -30 -10 -147
                                                                        -51 -260 -90 -356 -124 -434 -151 -490 -170 -30 -10 -147 -51 -260 -90 -356
                                                                        -124 -434 -151 -490 -170 -30 -10 -147 -51 -260 -90 -113 -39 -230 -80 -260
                                                                        -90 -30 -10 -147 -51 -260 -90 -356 -124 -434 -151 -490 -170 -30 -10 -147
                                                                        -51 -260 -90 -113 -39 -230 -80 -260 -90 -30 -10 -147 -51 -260 -90 -279 -97
                                                                        -410 -143 -575 -200 -77 -26 -194 -67 -260 -90 -66 -23 -183 -63 -260 -90 -77
                                                                        -26 -194 -67 -260 -90 -66 -23 -131 -45 -145 -50 -14 -4 -117 -40 -230 -80
                                                                        -113 -39 -230 -80 -260 -90 -30 -10 -147 -51 -260 -90 -113 -39 -268 -93 -345
                                                                        -120 -77 -26 -194 -67 -260 -90 -192 -66 -408 -141 -435 -150 -14 -4 -117 -40
                                                                        -230 -80 -220 -77 -479 -167 -520 -180 -14 -4 -117 -40 -230 -80 -113 -39
                                                                        -230 -80 -260 -90 -30 -10 -147 -51 -260 -90 -113 -39 -268 -93 -345 -120 -77
                                                                        -26 -194 -67 -260 -90 -192 -66 -408 -141 -435 -150 -14 -4 -117 -40 -230 -80
                                                                        -280 -98 -413 -144 -557 -193 -75 -25 -123 -47 -123 -55 0 -8 -5 -10 -12 -6
                                                                        -21 11 592 -621 1502 -1552 l265 -271 112 -279 c62 -153 181 -450 266 -659 85
                                                                        -209 236 -580 335 -825 99 -245 185 -457 192 -472 l13 -27 380 256 c209 141
                                                                        385 256 391 257 12 1 181 -170 1086 -1099 310 -319 661 -679 780 -800 118
                                                                        -121 363 -372 544 -558 181 -186 333 -334 337 -330 4 5 325 530 714 1168 777
                                                                        1273 1015 1664 1263 2070 91 149 202 331 247 405 45 74 156 257 247 405 91
                                                                        149 254 416 363 595 109 179 272 447 363 595 91 149 258 423 372 610 114 187
                                                                        389 637 610 1000 222 363 496 813 610 1000 114 187 388 637 610 1000 436 714
                                                                        1180 1935 1187 1948 7 11 -5 8 -122 -33z"/>
                                                                        </g>
                                                                    </svg>
                                                                </a>
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
