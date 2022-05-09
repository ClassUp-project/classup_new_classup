<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue !</title>
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
        <!--Container-->
        <div class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold mb-2 text-white">
                    Merci pour ton inscription {{$user->prenom}}!
                </h2>
                <h3 class="text-2xl mb-8 text-gray-200">
                    Class'Up t'aide à réviser facilement tes cours et tes matières en te permattant de répondre à de cours questionniares, regarder des vidéos sur le sujet et lire des documents.<br>
                    Tu peux aussi tester tes ami.e.s en postant tes propres quiz!
                </h3>
                <h3 class="text-2xl mb-8 text-gray-200">
                    Poste et réponds dès maintenant aux questionnaires dans la matière de ton choix.
                </h3>

                <button class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
                    Tous les cours
                </button>
            </div>
        </div>
</body>
</html>
