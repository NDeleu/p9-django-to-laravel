@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row py-1">
        <h3 class="col text-center">Ticket sur {{ $ticket->title }} - {{ $ticket->author }}</h3>
    </div>
    <div class="row py-1">
        <p class="col text-start">Ticket édité par @user_pronoun_choice($ticket->user)</p>
        <p class="col text-end">Le : {{ $ticket->time_created }}</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">Titre : {{ $ticket->title }}</p>
        <p class="col text-end">Auteur : {{ $ticket->author }}</p>
    </div>
    <div class="row py-1">
        @if ($ticket->image)
            <img class="col-2 text-start border border-secondary" src="{{ asset($ticket->image) }}">
        @endif
        <p class="col-4"></p>
        <p class="col text-end">Description : {{ $ticket->description }}</p>
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('create_review', ['ticket_id' => $ticket->id]) }}">Ajouter une critique</a>
    </div>
    <div class="row py-1 justify-content-center">
        @if ($ticket->user == Auth::user())
            <a class="col-2 btn btn-outline-secondary me-3" href="{{ route('edit_ticket', ['ticket_id' => $ticket->id]) }}">Modifier</a>
            <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('delete_ticket', ['ticket_id' => $ticket->id]) }}">Supprimer</a>
        @endif
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('home') }}">Retour au flux</a>
    </div>
</div>
@endsection
