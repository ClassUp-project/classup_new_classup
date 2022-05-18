<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chargez vos fichiers ici') }} &#128071;
        </h2>
    </x-slot>
@section('content')

    <div class="fixed flex items-center justify-center mt-20 alert-upload-file">
        @if(Session::has('success'))
                    <div class="fixed rounded-full bg-indigo-900 text-center py-4 lg:px-4 mt-4 mb-4 alert-upload-file-div">
                        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"><a href="{{ route('home') }}">Accueil</a></span>
                                    <span class="font-semibold mr-2 text-left flex-auto"><a href="{{ route('home') }}"> {{Session::get('success')}} </a> </span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                        </div>
                    </div>
        @endif
    </div>

    <!--Title-->
	<div class="text-center pt-16">
		<h1 class="text-gray-600 md:text-5xl">Enregistrez votre cours</h1>
	</div>


    <form action="{{route('telechargement')}}" enctype='multipart/form-data' method="post" >
        @csrf

        <div class="flex items-center justify-center mt-40 upload-file">

            <div class="content-center">
                <div class="mb-6">
                    <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titre</label>
                    <input type="text" name="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Donnez toutes les explications necessaires"></textarea>
                </div>

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fichier <span class="italic text-sm">optionnel</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type='file' name='file' class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline">

                    @if ($errors->has('file'))
                    <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
                    @endif
                </div>
                <label class="bblock uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="questionnaire_idquestionnaire">Questionnaire à joindre</label>
                                    <select name="questionnaire_idquestionnaire" id="questionnaire_idquestionnaire" class="form-select appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                        <option value="">pas de quiz à joindre</option>
                                        @foreach ( $questionnaire as $questionnaires )
                                        <option value="{{ $questionnaires->idquestionnaire }}">{{ $questionnaires->titre }}</option>
                                        @endforeach
                                    </select>
                <div class="content-center envoyer-fichier">
                    <div class="col-md-6">
                        <button type="submit" name="submit" value='Submit' class='border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline'>
                            envoyer
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="flex items-center justify-center mt-10">
        <a href="/home" class='border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline'>
            Retour à l'accueil
        </a>
    </div>

    <div class="p-10 justify-center items-center grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
    @foreach ($idFile as $item)
    <div class="w-80 flex mt-10 ml-20 flex-col bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-indigo-200 text-gray-700 text-lg px-6 py-4"><a href="{{ route('cours') }}">{{ $item->titre }}</a></div>

            <div class="flex justify-between items-center px-6 py-4">
            <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-gray-200 font-bold">Prêt à consulter</div>
            <div class="text-sm">{{ date('d-m-y', strtotime($item->created_at)) }}</div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200">
            <div class="border rounded-lg p-4 bg-gray-200">
                <a href="{{ route('cours') }}">{{ Str::limit($item->description,30) }}</a>
            </div>
            </div>

            <div class="bg-indigo-200 px-6 py-4">

            <div class="flex items-center pt-3">
                <div class="bg-blue-700 w-12 h-12 flex justify-center items-center rounded-full uppercase font-bold text-white">DOC</div>
                <div class="ml-4">
                <p class="font-bold">Piéce jointe</p>
                <p class="text-sm text-gray-700 mt-1"><a href="{{ route('cours') }}">{{ Str::limit($item->original, 30) }}</a></p>
                </div>
            </div>
        </div>
        <div class="bg-gray-200 px-6 py-4 flex justify-center items-center pt-3">
        <form action="/telechargement/{{ $item->iddropzone }}" method="post" >
            @method('DELETE')
            @csrf
            <button class="text-red-500 mt-2 font-bold">Supprimer</button>
        </form>
        </div>
    </div>
    @endforeach
    </div>



@endsection


</x-app-layout>
