@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">
            Modification de la critique concernant le ticket {{ $ticket->title }} - {{ $ticket->author }}
        </h2>
    </div>

    <div class="row pt-1 pb-3">
        <div class="px-5 py-2 container border border-2 border-secondary">
            <div class="row py-2">
                <h4 class="col text-start">Vous êtes en train de poster en réponse à</h4>
            </div>
            <div class="px-5 py-2 container border border-2 border-secondary">
                <div class="row py-1">
                    <p class="col fs-5 text-start">
                        <a class="col link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('ticket_detail', ['ticket_id' => $ticket->id]) }}">
                            Critique demandée par @user_pronoun_choice($ticket->user)
                        </a>
                    </p>
                    <p class="col text-end fw-light fst-italic">édité le {{ $ticket->time_created }}</p>
                </div>
                <div class="row py-1">
                    <p class="col text-start">{{ $ticket->title }} - {{ $ticket->author }}</p>
                </div>
                <div class="row py-1">
                    <p class="col text-start">Description : {{ $ticket->description }}</p>
                </div>
                <div class="row py-1">
                    @if ($ticket->image)
                        <img class="col-2 text-start border border-secondary" src="{{ asset($ticket->image) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-1 pb-3">
        <div class="px-5 py-2 container border border-2 border-secondary">
            <div class="row py-2">
                <h3 class="col text-center">Critique</h3>
            </div>
            <form class="row pt-1 pb-3 justify-content-end" method="post" enctype="multipart/form-data">
                @csrf
                {{ Form::model($formModel, ['route' => ['update_review', $ticket->id, $review->id]]) }}
                {{ method_field('PATCH') }}
                @include('rthome.form.review_form')
                <button class="col-2 btn btn-outline-secondary" type="submit">Modifier</button>
                {{ Form::close() }}
            </form>
        </div>
    </div>
</div>
@endsection
