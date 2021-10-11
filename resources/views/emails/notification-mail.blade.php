<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Merci pour ton inscription {{ $user->prenom }}</h1>
    <h2>{{ $post['title'] }}</h2>
    <h3>Poste et réponds dès maintenant aux questionnaires dans la matière de ton choix</h3>

    <button type="button" class="btn btn-dark" >
        <a id="navigation-to-dashboard" href="https://classup.tech/login" class="ml-40 bg-blue-500 text-white font-bold py-2 px-4 pl-6 mb-10 rounded-full">Tous les cours</a>
    </button>
</body>
</html>
