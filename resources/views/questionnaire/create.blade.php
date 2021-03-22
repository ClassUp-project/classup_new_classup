@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creation Nouveau questionnaire</div>

                <div class="card-body">

                    <form action="/questionnaires" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=titre">Titre</label>
                            <input name="titre" type="text" class="form-control" id="titre" aria-describedby="titreHelp" placeholder="Entrer un Titre">
                            <small id="titleHelp" class="form-text text-muted">Donnez à votre questionnaire un titre qui attire l'attention.</small>
                            @error('titre')
                        <small class="text-danger">{{ $message}}</small>
                            @enderror

                          </div>

                          <div class="form-group">
                            <label for="proposition">L'objet</label>
                            <input name="proposition" type="text" class="form-control" id="proposition" aria-describedby="propositionHelp" placeholder="Entrer un objet">
                            <small id="propositionHelp" class="form-text text-muted">donner un l'objet a la question.</small>

                            @error('proposition')
                            <small class="text-danger">{{ $message}}</small>
                                @enderror

                          </div>
                          <button type="submit" class="btn btn-primary">Creation Question</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
