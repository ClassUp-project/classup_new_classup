<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les catégories') }} &#127774;
        </h2>
    </x-slot>

    @section('content')

    <div class="flex justify-left items-center bg-gray-100 h-full allcateg-return">
        <a href="{{ route('home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: royalblue; margin-left: 50px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </a>
    </div>

        <div class="flex justify-center items-center bg-gray-200 h-full all-acteg">
            <div class="all-acteg-div">
            @foreach ( $allcateg as  $allcategs )

                <a class="a-categ-all" href="/categ/{{ $allcategs->idcategorie }}">
                    <h1 class="flex justify-center items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full mr-20 mt-32 mb-32 all-categ-all">
                        {{ $allcategs->name }}
                    </h1>
                </a>

            @endforeach
            </div>
        </div>



    @endsection


</x-app-layout>
