<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultats des élèves') }} &#128202;
        </h2>
    </x-slot>

    @section('content')

    <div class="flex justify-left items-center bg-yellow-50 h-full allcateg-return-categ relative shadow-lg">
        <a href="{{ route('dashboard') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: royalblue; margin-left: 50px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </a>
    </div>

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
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for=nom">nom - prenom</label>
                                <small id="titleHelp" class="form-text text-muted"></small>
                                <select name="eleve_ideleve" class="form-select appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                    @foreach ( $utilisateur as $utilisateurs )
                                    <option value="{{ $utilisateurs->ideleve }}">{{ $utilisateurs->nom }} {{$utilisateurs->prenom}}</option>
                                    @endforeach
                                </select>
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
