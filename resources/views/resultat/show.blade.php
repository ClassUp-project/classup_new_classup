<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les résultats') }}
        </h2>
    </x-slot>


<table class="table-fixed">
    <thead>
      <tr>
        <th class="w-1/2 ...">nom</th>
        <th class="w-1/4 ...">note</th>
      </tr>
    </thead>
    <tbody>
      <tr class="bg-blue-200">
        <td>{{ $resultat->nom }}</td>
        <td>{{ $resultat->note }}</td>
      </tr>
    </tbody>
  </table>

</x-app-layout>
