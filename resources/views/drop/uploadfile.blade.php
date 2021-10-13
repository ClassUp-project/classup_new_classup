<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chargez vos fichiers ici') }} &#128071;
        </h2>
    </x-slot>

    <div class="flex items-center justify-center mt-40">
        @if(Session::has('success'))
                    <div class="fixed rounded-full bg-indigo-900 text-center py-4 lg:px-4 mt-4 mb-4">
                        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"><a href="{{ route('home') }}">Accueil</a></span>
                                    <span class="font-semibold mr-2 text-left flex-auto"><a href="{{ route('home') }}"> {{Session::get('success')}} </a> </span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                        </div>
                    </div>
        @endif
    </div>


    <form action="{{route('images')}}" enctype='multipart/form-data' method="post" >
        @csrf

        <div class="flex items-center justify-center mt-40">

            <div class="flex content-center">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <input type='file' name='file' class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline">

                    @if ($errors->has('file'))
                    <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
                    @endif
                </div>
            </div>

            <div class="flex content-center">
                <div class="col-md-6">
                    <button type="submit" name="submit" value='Submit' class='border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline'>
                        envoyer
                    </button>
                </div>
            </div>
        </div>

    </form>

    <div class="flex items-center justify-center mt-10">
        <a href="/home" class='border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline'>
            Retour à l'accueil
        </a>
    </div>


        <div class="h-48 flex flex-wrap content-start mt-20 ml-40 mr-40 ...">

            @foreach ($idFile as $item)
                <div class="flex items-stretch bg-indigo-200 h-24 m-4">
                    <div class="flex-1 text-white text-center bg-indigo-400 px-4 py-2 m-2 ">
                    <a href="{{ Route('download', $item->iddropzone)}}" download="{{ $item->original }}">
                        {{ Str::limit( $item->thumbnail, 35 )}}
                    </a>
                    <form action="/images/{{ $item->iddropzone }}" method="post" >
                        @method('DELETE')

                        @csrf

                        <button class="text-red-500 mt-2 font-bold">Supprimer</button>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>


</x-app-layout>
