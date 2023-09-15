@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-start">Erreur d'édition d'une critique</h2>
    </div>
    <div class="row py-1">
        <p class="col text-start">Il n'est possible d'éditer qu'une seule critique par utilisateur sur un même ticket</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">Vous avez déjà édité une critique sur le ticket concernant {{ $ticket->title }} - {{ $ticket->author }} édité par {{ $ticket->user }} le {{ $ticket->time_created }}</p>
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('home') }}">Retour au flux</a>
    </div>
</div>
@endsection
