<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container">

            <div class="flex justify-center mt-20">
                <div class="card">
                    <div class="inline-block bg-blue-200 rounded-full px-3 py-1 text-lg font-semibold text-gray-700 ml-20 mb-2">{{$questionnaire->titre}}</div>

                    <div class="flex justify-center mt-20">

                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="/questionnaires/{{$questionnaire->idquestionnaire}}/questions/create"> Rajouter
                            des Questions</a>
                        <a class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                            href="/surveys/{{$questionnaire->idquestionnaire}}-{{Str::slug($questionnaire->titre)}}">répondre à
                            l'enquête</a>

                    </div>
                </div>

                @foreach($questionnaire->questions as $question)

                <div class="flex flex-col bg-gray-300 p-4 mt-60">
                    <div class="px-6 py-4 font-bold text-xl mb-2">{{$question->question}}</div>

                    <div class="card-body">
                        <ul class="flex flex-col bg-gray-300 p-4">
                            @foreach($question->answers as $answer)
                            <li class="border-gray-400 flex flex-row mb-2">
                                <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div>{{$answer->reponse}}</div>
                                @if($question->responses->count())
                                <div class="ml-10 text-green-400">{{intval(($answer->responses->count()* 100)/$question->responses->count())}}%</div>
                                @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="card-footer">
                        <form action="/questionnaires/{{$questionnaire->idquestionnaire}}/questions/{{$question->idquestion}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Supprimer la question</button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>

    </div>
    @endsection

</x-app-layout>
