<div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl mb-20 mt-10">
<div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')"></div>
<!-- Success message -->
@if(Session::has('success'))
    <div class="fixed rounded-full bg-indigo-900 text-center py-4 lg:px-4 mt-4 mb-4">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"><a href="/">Accueil</a></span>
                    <span class="font-semibold mr-2 text-left flex-auto"><a href="/"> {{Session::get('success')}} </a> </span>
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
@endif
        <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">Contactez la team Class'Up</h2>
            <p class="text-xl text-gray-600 text-center mt-4">Dites nous tous !</p>

                <form class="w-full max-w-lg mt-10" method="post" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-prenom">
                        Prenom
                        </label>
                        <input id="prenom" name="prenom" class="form-control {{ $errors->has('prenom') ? 'error' : '' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane">
                        <!-- Error -->
                        @if ($errors->has('prenom'))
                        <div class="error">
                            {{ $errors->first('prenom') }}
                        </div>
                        @endif
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nom">
                        Nom
                        </label>
                        <input id="nom" name="nom" class="form-control {{ $errors->has('nom') ? 'error' : '' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Doe">
                        <!-- Error -->
                        @if ($errors->has('nom'))
                        <div class="error">
                            {{ $errors->first('nom') }}
                        </div>
                        @endif
                    </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Email
                        </label>
                        <input name="email" class="form-control {{ $errors->has('email') ? 'error' : '' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                        @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-message">
                        Message
                        </label>
                        <textarea name="message" class="form-control {{ $errors->has('message') ? 'error' : '' }} no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
                        @if ($errors->has('message'))
                        <div class="error">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                    </div>

                    <div class="w-full px-3">
                        <div class="">
                            <input type="hidden" name="g-recaptcha-response" id="recaptcha">
                        </div>
                    </div>

                    </div>

                    <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button type="submit" name="envoyer" value="Submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Envoyer
                        </button>
                    </div>
                    <div class="md:w-2/3"></div>
                    </div>

                </form>
        </div>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
</script>
