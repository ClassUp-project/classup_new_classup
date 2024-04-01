<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AI generation') }} &#129302;
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

    <form action={{route('formAi')}} method="post">
        @csrf
        <div class="container">
            <div class="flex justify-center ml-40 mt-20 questionniare-div">
                    <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            <button type="submit" name="submit" value="submit" class="ml-40 mt-20 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Générer le cours</button>
        </div>
    </form>
    <div class="flex justify-center ml-40 mt-20 questionniare-div">
       <article class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $gptResponse }}
       </article>
    </div>

    @endsection
</x-app-layout>


