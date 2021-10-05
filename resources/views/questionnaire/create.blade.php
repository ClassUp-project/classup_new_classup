<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }} &#128221;
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <div class="flex justify-center ml-40 mt-20 questionniare-div">
            <div class="col-md-8">
                <div class="card">
                    <div class="font-bold text-xl mb-2">Creation d'un nouveau questionnaire</div>

                    <div class="card-body">

                        <form action="/questionnaires" method="post">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for=titre">Titre</label>
                                <input name="titre" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="titre" aria-describedby="titreHelp" placeholder="Entrer un Titre">
                                <small id="titleHelp" class="form-text text-muted">Donnez à votre questionnaire un titre qui attire l'attention.</small>
                                @error('titre')
                            <small class="text-danger">{{ $message}}</small>
                                @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="proposition">L'objet</label>
                                <input name="proposition" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="proposition" aria-describedby="propositionHelp" placeholder="Entrer un objet">
                                <small id="propositionHelp" class="form-text text-muted">donner un objet a la question.</small>

                                @error('proposition')
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


