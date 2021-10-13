<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Ghostwind CSS : Tailwind Toolbox</title>
		<meta name="author" content="name">
    <meta name="description" content="description here">
		<meta name="keywords" content="keywords,here">
		<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal">

    	<!--Title-->
	<div class="text-center pt-16 md:pt-32">
		<h1 class="font-bold break-normal text-3xl md:text-5xl">{{ $post['title'] }}</h1>
	</div>

	<!--image-->
	<div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('https://source.unsplash.com/collection/1118905/'); height: 75vh;"></div>

        <!--Container-->
        <div class="container max-w-5xl mx-auto -mt-32">

            <div class="mx-0 sm:mx-6">

                <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

                    <!--Post Content-->


                    <!--Lead Para-->
                    <p class="text-2xl md:text-3xl mb-5">
                        👋 Merci pour ton inscription {{ $user->prenom }}
                    </p>

                    <p class="py-6">Poste et réponds dès maintenant aux questionnaires dans la matière de ton choix.</p>

                    <p class="py-6">Class'Up t'aide à réviser facilement tes cours et tes matières en te permattant de répondre à de cours questionniares, regarder des viséos sur le sujet et lire des documents.<br>
                                    Tu peux aussi tester tes ami.e.s en postant tes propres quiz ;) !
                    </p>

                    <ol>
                        <li class="py-3">Réponds aux questionnaires</li>
                        <li class="py-3">Postes tes propres quiz</li>
                        <li class="py-3">Lis les documents postés ou les vidéos</li>
                    </ol>

                    <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                        <button href="https://classup.tech/login" type="submit" class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Tous les cours</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
