<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les catégories') }} &#127774;
        </h2>
    </x-slot>

    @section('content')

        <div class="flex justify-center items-center bg-gray-200 h-full all-acteg">
            @foreach ( $allcateg as  $allcategs )

                <a href="/categ/{{ $allcategs->idcategorie }}">
                    <h1 class="font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full mr-20 mt-32 mb-32">
                        {{ $allcategs->name }}
                    </h1>
                </a>

            @endforeach
        </div>



    @endsection


</x-app-layout>
