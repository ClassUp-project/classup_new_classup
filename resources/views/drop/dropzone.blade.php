<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dropzone-files</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <link rel="stylesheet" href="{{mix('/css/app.css')}}">



    </head>

    <body>
        <div class="flex-center position-ref full-height" id="app">


         <example-component></example-component>

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

            <div class="container">
                <div class="row">

                    @foreach ($images_id as $item)


                    <div class="col-6 mb-5 mt-4">
                        <a href="{{ route('download', $item->id)}}" download="{{ $item->original }}">
                            {{ Str::limit( $item->thumbnail, 35 )}}
                        </a>
                        <form action="/images/{{ $item->id }}" method="post" >
                            @method('DELETE')

                            @csrf

                            <button class="small btn btn-outline-danger mt-2">Delete</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 ">
                <a href="/home" class="ml-5" style="color:blue;">
                    <button class="btn btn-primary w-40">
                        <img src="https://img.icons8.com/ios/50/000000/hand-left.png" style="width:35px; height:35px; padding-bottom:5px"/> Retrouvez tous vos docs
                    </button>
                </a>
            </div>



        </div>

        <script src="{{mix('/js/app.js')}}">
</script>



</body>

</html>
