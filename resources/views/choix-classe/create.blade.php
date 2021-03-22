<div class="container">

    <h2>Professeur : {{ Auth::user()->nom }}</h2>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <form method="post" action="/maclasses">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="acronyme" class="col-md-4 col-form-label text-md-right">{{ __('Acronyme') }}</label>

                            <div class="col-md-6">
                                <input id="acronyme" type="text" class="form-control @error('acronyme') is-invalid @enderror" name="acronyme" value="{{ old('acronyme') }}" required autocomplete="acronyme" autofocus>

                                @error('acronyme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lintitule" class="col-md-4 col-form-label text-md-right">{{ __('Ma matière') }}</label>

                            <div class="col-md-6">
                                <input id="lintitule" type="text" class="form-control @error('lintitule') is-invalid @enderror" name="lintitule" value="{{ old('lintitule') }}" required autocomplete="lintitule" autofocus>

                                @error('lintitule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Vers mon dashboard</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
