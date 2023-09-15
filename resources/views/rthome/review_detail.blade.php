@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row py-1">
        <h3 class="col text-center">Critique concernant le ticket sur {{ $ticket->title }} - {{ $ticket->author }}</h3>
    </div>
    <div class="row py-1">
        <p class="col text-start">Critique éditée par @user_pronoun_choice($review->user)</p>
        <p class="col text-end">Le : {{ $review->time_created }}</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">
            {{ $review->headline }} -
            @if ($review->rating == 1)
                ★☆☆☆☆
            @elseif ($review->rating == 2)
                ★★☆☆☆
            @elseif ($review->rating == 3)
                ★★★☆☆
            @elseif ($review->rating == 4)
                ★★★★☆
            @elseif ($review->rating == 5)
                ★★★★★
            @else
                ☆☆☆☆☆
            @endif
        </p>
        <p class="col text-center">Commentaire : {{ $review->body }}</p>
    </div>
    <div class="row py-1">
        <div class="px-5 py-2 container border border-2 border-secondary">
            <div class="row py-1">
                <p class="col fs-5 text-start">
                    <a class="col link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('ticket_detail', ['ticket_id' => $review->ticket->id]) }}">
                        Critique demandée par @user_pronoun_choice($review->ticket->user)
                    </a>
                </p>
                <p class="col text-end fw-light fst-italic">édité le {{ $review->ticket->time_created }}</p>
            </div>
            <div class="row py-1">
                <p class="col text-start">{{ $review->ticket->title }} - {{ $review->ticket->author }}</p>
            </div>
            <div class="row py-1">
                <p class="col text-start">Description : {{ $review->ticket->description }}</p>
            </div>
            <div class="row py-1">
                @if ($review->ticket->image)
                    <img class="col-2 text-start border border-secondary" src="{{ asset($review->ticket->image) }}">
                @endif
            </div>
        </div>
    </div>
    <div class="row py-1 justify-content-center">
        @if ($review->user == Auth::user())
            <a class="col-2 btn btn-outline-secondary me-3" href="{{ route('edit_review', ['ticket_id' => $review->ticket->id, 'review_id' => $review->id]) }}">Modifier</a>
            <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('delete_review', ['ticket_id' => $review->ticket->id, 'review_id' => $review->id]) }}">Supprimer</a>
        @endif
    </div>
    <div class="row py-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('home') }}">Retour au flux</a>
    </div>
</div>
@endsection
