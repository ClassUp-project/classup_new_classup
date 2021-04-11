<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reponse au questionniare') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <div class="flex justify-center mt-20">
            <div class="col-md-8">

                <h1 class="px-6 py-4 font-bold text-xl mb-2">{{$questionnaire->titre}}</h1>

                <form action="/surveys/{{$questionnaire->idquestionnaire}}-{{Str::slug($questionnaire->titre)}}" method="post">
                    @csrf
                    @foreach ($questionnaire->questions as $key => $question)

                    <div class="card mt-4">
                        <div class="card-header"><strong class="px-6 py-4 font-bold text-xl mb-2">{{ $key + 1 }}</strong>
                            {{$question->question}}</div>

                        <div class="flex flex-col bg-gray-300 p-4 mt-10">

                            @error('reponse.'. $key. '.reponse_idreponse')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach($question->answers as $answer)

                                <label for="reponse{{$answer->idreponse}}">
                                    <li class="list-group-item list-group-item-action list-group-item-light ">
                                        <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg mt-4">
                                        <input type="radio" name="reponse[{{$key}}][reponse_idreponse]" id="reponse{{$answer->idreponse}}"
                                            {{(old('reponse.'. $key. '.reponse_idreponse') ==$answer->idreponse)? 'checked': ''}}
                                            class="mr-2" value="{{ $answer->idreponse}}">
                                        {{ $answer->reponse}}

                                        <input type="hidden" name="reponse[{{$key}}][question_idquestion]"
                                            value="{{$question->idquestion}}">
                                        </div>
                                    </li>
                                </label>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @endforeach


                    <div class="card mt-4">
                        <div class="card-header">Vos Informations</div>

                        <div class="flex justify-center mt-20">
                            <div class="form-group">
                                <label for="name">Votre Nom</label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="enquete[nom]" type="text" class="form-control" id="nom"
                                    aria-describedby="nomHelp" placeholder="Entrer votre Nom">
                                <small id="nomHelp" class="form-text text-muted">Salut quel est ton nom?</small>
                                @error('nom')
                                <small class="text-danger">{{ $message}}</small>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="email">Votre Email</label>
                                <input class="ml-6 appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="enquete[email]" type="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Entrer un Email">
                                <small id="emailHelp" class="form-text text-muted">Quel est ton email?</small>

                                @error('email')
                                <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>

                            <div class="px-6 pt-4 pb-2 mt-4 ml-10">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Question complète</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
