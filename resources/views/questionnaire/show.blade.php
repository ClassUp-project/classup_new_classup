<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }}
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

            <div class="flex justify-center mt-20">
                <div class="card">
                    <div class="inline-block bg-blue-200 rounded-full px-3 py-1 text-lg font-semibold text-gray-700 ml-20 mb-2 button-tag-show">{{$questionnaire->titre}}</div>

                        <div class="flex justify-center mt-20 div-button-show-question">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full button-questionnaire-show" href="/questionnaires/{{$questionnaire->idquestionnaire}}/questions/create">
                                Ajoutez vos questions
                            </a>
                        </div>
                    </div>
                </div>

                @foreach($questionnaire->questions as $question)

                <div class="flex flex-col bg-blue-200 p-4 mt-60 div-question-tab">
                    <div class="px-6 py-4 font-bold text-xl mb-2">{{$question->question}}</div>

                    <div class="card-body">
                        <ul class="flex flex-col bg-blue-300 p-4">
                            @foreach($question->answers as $answer)
                            <li class="border-gray-500 flex flex-row mb-2">
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
                </div>
                @endforeach

            </div>

    </div>
    @endsection

</x-app-layout>
