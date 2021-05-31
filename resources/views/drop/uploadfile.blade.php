<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chargez vos fichiers ici') }}
        </h2>
    </x-slot>


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

                        <button class="small btn btn-outline-danger mt-2">Delete</button>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>


</x-app-layout>
