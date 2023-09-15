<div class="px-5 py-2 container border border-2 border-secondary">
    <div class="row py-1">
        <p class="col fs-5 text-start">
            <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('ticket_detail', ['ticket_id' => $ticket->id]) }}">
                Critique demandée par @user_pronoun_choice($ticket->user, Auth::user())
            </a>
        </p>
        <p class="col text-end fw-light fst-italic">édité le {{ $ticket->time_created }}</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">{{ $ticket->title }} - {{ $ticket->author }}</p>
    </div>
    <div class="row py-1">
        <p class="col text-start">{{ $ticket->description }}</p>
    </div>
    <div class="row py-1">
        @if ($ticket->image)
            <img class="col-2 text-start border border-secondary" src="{{ asset($ticket->image) }}">
        @endif
    </div>
    <div class="row justify-content-end py-1">
        <a class="col-2 btn btn-outline-secondary me-3" href="{{ route('edit_ticket', ['ticket_id' => $ticket->id]) }}">Modifier</a>
        <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('delete_ticket', ['ticket_id' => $ticket->id]) }}">Supprimer</a>
    </div>
</div>
