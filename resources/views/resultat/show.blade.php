<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les résultats') }}
        </h2>
    </x-slot>


<div class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10 note-eleve" id="app">
    @foreach ($resultats as $resultat )
        <table class="table-fixed table-resultat">
            <thead>
            <tr>
                <th class="w-1/2 ...">nom</th>
                <th class="w-1/4 ...">note</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-blue-200 align-items-center">
                <td>{{ $resultat->nom }}</td>
                <td>{{ $resultat->note }}</td>
            </tr>
            </tbody>
        </table>
    @endforeach
</div>

<div class="flex justify-center mt-20 " >


    <a href="/dashboard" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 pl-6 mb-10 rounded-full">Retour à votre dashboard</a>


</div>

</x-app-layout>
