@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-start">Erreur de création d'abonnement</h2>
    </div>
    <div class="row py-1">
        <p class="col text-start">Il est impossible de créer un abonnement avec soi-même.</p>
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('follow_users_form') }}">Retour aux abonnements</a>
    </div>
</div>
@endsection
