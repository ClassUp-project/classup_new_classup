<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }} &#128221;
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
        <div class="flex justify-center ml-40 mt-20 questionniare-div">
            <div class="col-md-8">
                <div class="card form-questionnaire">
                    <div class="font-bold text-xl mb-2">Creation d'un nouveau questionnaire</div>

                    <div class="card-body">

                        <form action="/questionnaires" method="post">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titre">Titre</label>
                                <input name="titre" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="titre" aria-describedby="titreHelp" placeholder="Entrer un Titre">
                                <small id="titleHelp" class="form-text text-muted">Donnez à votre questionnaire un titre qui attire l'attention.</small>
                                @error('titre')
                            <small class="text-danger">{{ $message}}</small>
                                @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="proposition">L'objet</label>
                                <input name="proposition" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="proposition" aria-describedby="propositionHelp" placeholder="Entrer un objet">
                                <small id="propositionHelp" class="form-text text-muted">donner un objet a la question.</small>

                                @error('proposition')
                                <small class="text-danger">{{ $message}}</small>
                                    @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">La description</label>
                                <textarea name="description" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="description" aria-describedby="descriptionHelp" placeholder="Entrer une description"></textarea>
                                <small id="descriptionHelp" class="form-text text-muted">de quel sujet traite le questionnaire.</small>

                                @error('description')
                                <small class="text-danger">{{ $message}}</small>
                                    @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="bblock uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categorie_idcategorie">La catégorie</label>
                                    <select name="categorie_idcategorie" class="form-select appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                        @foreach ( $categories as $categorie )
                                        <option value="{{ $categorie->idcategorie }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                <small id="categorie_idcategorieHelp" class="form-text text-muted mt-2">Attribuez le à une catégorie</small>

                                @error('categorie_idcategorie')
                                <small class="text-danger">{{ $message}}</small>
                                    @enderror

                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Creation Question</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>


