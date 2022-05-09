@component('mail::message')
 <!--Title-->
		<h1>{{ $post['title'] }}</h1>
        <!--Container-->
        <h2>
            Merci pour ton inscription {{$user->prenom}}!
        </h2>
        <h3>
            Class'Up t'aide à réviser facilement tes cours et tes matières en te permattant de répondre à de cours questionniares, regarder des vidéos sur le sujet et lire des documents.<br>
            Tu peux aussi tester tes ami.e.s en postant tes propres quiz!
        </h3>
        <h3>
            Poste et réponds dès maintenant aux questionnaires dans la matière de ton choix.
        </h3>

        @component('mail::button', ['url' => $post])
        Tous les cours
        @endcomponent
@endcomponent
