@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-start">Erreur de modification d'une critique</h2>
    </div>
    <div class="row py-1">
        <p class="col text-start">Seul le créateur de la critique peut modifier ou supprimer cette critique.</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">Vous n'êtes pas le créateur de cette critique. Son créateur est {{ $review->user }} répondant au ticket de {{ $ticket->user }}.</p>
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('home') }}">Retour au flux</a>
    </div>
</div>
@endsection
