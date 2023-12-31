@extends('layout.app')

@section('content')
    <div class="px-5 py-2 container">
        <div class="row pt-1 pb-3">
            <h2 class="col text-start">Mot de passe modifié avec succès</h2>
        </div>
        <div class="row py-1">
            <p class="col text-start">Vous avez changé votre mot de passe avec succès !</p>
        </div>
        <div class="row py-1">
            <p class="col text-start">
                Cliquez
                <a class="btn btn-outline-secondary" href="{{ route('home') }}">ici</a>
                pour revenir à la page d'accueil.
            </p>
        </div>
    </div>
@endsection
