<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultats des élèves') }} &#128202;
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <div class="flex justify-center ml-40 mt-20">
            <div class="col-md-8">
                <div class="card resultat-eleve">
                    <div class="font-bold text-xl mb-2">Entrez des résultat pour un élève</div>
                    <div class="font-bold text-sm mb-2">Enregistrez la note obtenu par votre élève</div>

                    <div class="card-body">

                        <form action="/resultat" method="post">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for=nom">nom- prenom</label>
                                <input name="nom" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nom" aria-describedby="nomHelp" placeholder="Entrez un nom">
                                <small id="titleHelp" class="form-text text-muted">Quel est le nom de votre élève</small>
                                @error('nom')
                            <small class="text-danger">{{ $message}}</small>
                                @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="note">note</label>
                                <input name="note" type="note" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="note" aria-describedby="noteHelp" placeholder="donnez une note ou une apreciation">
                                <small id="noteHelp" class="form-text text-muted">Vous pouvez entrer une note ou simplement une appreciation</small>

                                @error('note')
                                <small class="text-danger">{{ $message}}</small>
                                    @enderror

                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">enregistrer la note</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection



</x-app-layout>
