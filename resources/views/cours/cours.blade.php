<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours') }} &#128187;
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


        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5 mt-10">
            <!--Card 1-->
            @foreach($file as $cours)
            <div class="max-w-sm rounded shadow-lg">
            <img class="w-full" src="img/header.png" alt="Mountain">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">

                    <a class="bg bg-green-200 p-1 rounded-lg" href="{{route('cours_details', $cours)}}">{{ $cours->titre }}</a>
                </div>
                <p class="text-gray-700 text-base">
                    <p>{{ Str::limit( $cours->description, 150 ) }}</p>
                    <div class="bg-purple-100 p-1 rounded-lg mt-2">
                    <a href="" class="text-blue-500 hover:text-blue-700">{{ Str::limit( $cours->thumbnail, 35 ) }}</a>
                    </div>
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
            </div>
            @endforeach
        </div>


    @endsection
</x-app-layout>
