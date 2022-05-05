<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les catégories') }} &#127774;
        </h2>
    </x-slot>

    @section('content')

    <div class="justify-left items-center bg-gray-100 h-0 allcateg-return">
        <a href="{{ route('home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: royalblue; margin-left: 50px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </a>
    </div>

        <div class="bg-yellow-50 grid grid-cols-3 gap-4 content-start justify-center items-center mt-20 div-card-home">
         @foreach ( $allcateg as  $allcategs )
        <div class="bg-white p-10 rounded-lg shadow-md px-3 py-1 m-6">
            <h1 class="text-xl font-bold">Jump back in!</h1>
            <a class="a-categ-all" href="/categ/{{ $allcategs->idcategorie }}">
                <h3 class="text-xl font-bold all-categ-all bg-green-200 px-3 py-1 rounded-full mr-40 mt-5">
                    {{ $allcategs->name }}
                </h3>
            </a>
                <div class="mt-4 mb-10">
                <p class="text-gray-600">Course 75% completed</p>
                <div class="bg-gray-400 w-64 h-3 rounded-lg mt-2 overflow-hidden">
                    <div class="bg-pink-400 w-3/4 h-full rounded-lg shadow-md"></div>
                </div>
                </div>
            <h3 class="text-xs uppercase">Current lesson:</h3>
                <h2 class="tracking-wide">
                Object in JavaScript
                <br />
                (Challenge)
                </h2>
            <a class="a-categ-all" href="/categ/{{ $allcategs->idcategorie }}">
            <button class="bg-green-400 py-3 px-8 mt-4 rounded text-sm font-semibold hover:bg-opacity-75">Go to lesson</button>
            </a>
        </div>
        @endforeach
        </div>



    @endsection


</x-app-layout>
