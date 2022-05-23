<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours') }} &#128187;
        </h2>
    </x-slot>

    @section('content')

    <div class="flex justify-left items-center bg-yellow-50 h-full allcateg-return-categ relative shadow-lg">
        <a href="{{ route('home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: royalblue; margin-left: 50px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </a>
    </div>


        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5 mt-10">
            <!--Card 1-->
            @foreach($file as $cours)
            <div class="max-w-sm rounded shadow-lg">
            <img class="w-full" src="/img/header.png" alt="Mountain">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">

                    <a class="bg bg-green-200 p-1 rounded-lg" href="{{route('cours_details', $cours)}}">{{ $cours->titre }}</a>
                </div>
                <p class="text-gray-700 text-base">
                    <p>{{ Str::limit( $cours->description, 150 ) }}</p>
                    <div class="bg-purple-100 p-1 rounded-lg mt-2">
                    <a href="{{ route('download', $cours )}}" download="{{ $cours->original }}" class="text-blue-500 hover:text-blue-700">{{ Str::limit( $cours->thumbnail, 35 ) }}</a>
                    </div>
                </p>
            </div>
            </div>
            @endforeach
        </div>


    @endsection
</x-app-layout>
