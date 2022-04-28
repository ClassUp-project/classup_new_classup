<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="flex justify-center mt-20">
                    <div class="font-bold text-xl mb-2">Ajoutez vos questions</div>

                    <div class="flex justify-center mt-20">

                        <form action="/questionnaires/{{$questionnaire->idquestionnaire}}/questions" method="post">

                            @csrf


                            <div class="form-group">
                                <label class="block uppercase tracking-wide text-gray-700 text-ml font-bold mb-2" for=question">Question</label>
                                <input name="question[question]" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    value="{{old('question.question')}}" id="question" aria-describedby="questionHelp"
                                    placeholder="Entrer une Question">
                                <small id="questionHelp" class="form-text text-muted">Posez une question simple et précise
                                    pour un meilleurs résultats.</small>
                                @error('question.question')
                                <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>


                            <div class="form-group mt-10">
                                <fieldset>

                                    <legend>Les Choix</legend>
                                    <small id="choiceHelp" class="form-text text-muted">Proposez vos choix</small>

                                    <div>

                                        <div class="form-group mt-4">
                                            <label for="reponse1">Choix 1</label>
                                            <input name="reponse[][reponse]" type="text" value="{{old('reponse.0.reponse')}}"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="answers1" aria-describedby="choiceHelp"
                                                placeholder="Entrer Choix 1">
                                            @error('reponse.0.reponse')
                                            <small class="text-danger">{{ $message}}</small>
                                            @enderror

                                        </div>

                                    </div>
                                    <div>

                                        <div class="form-group mt-4">
                                            <label for="reponse2">Choix 2</label>
                                            <input name="reponse[][reponse]" type="text" value="{{old('reponse.1.reponse')}}"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="reponse2" aria-describedby="choiceHelp"
                                                placeholder="Entrer Choix 2">
                                            @error('reponse.1.reponse')
                                            <small class="text-danger">{{ $message}}</small>
                                            @enderror

                                        </div>

                                    </div>
                                    <div>

                                        <div class="form-group mt-4">
                                            <label for="reponse3">Choix 3</label>
                                            <input name="reponse[][reponse]" type="text" value="{{old('reponse.2.reponse')}}"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="reponse3" aria-describedby="choiceHelp"
                                                placeholder="Entrer Choix 3">
                                            @error('reponse.2.reponse')
                                            <small class="text-danger">{{ $message}}</small>
                                            @enderror

                                        </div>

                                    </div>
                                    <div>

                                        <div class="form-group mt-4">
                                            <label for="reponse">Choix 4</label>
                                            <input name="reponse[][reponse]" type="text" value="{{old('reponse.3.reponse')}}"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="reponse4" aria-describedby="choiceHelp"
                                                placeholder="Entrer Choix 4">
                                            @error('reponse.3.reponse')
                                            <small class="text-danger">{{ $message}}</small>
                                            @enderror

                                        </div>

                                    </div>

                                </fieldset>
                            </div>

                            <button type="submit" class="mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Rajouter Question</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
