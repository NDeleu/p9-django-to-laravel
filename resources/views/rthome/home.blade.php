@extends('layout.app')

@section('content')
<div class="container text-center px-5">
    <div class="row py-4">
        <h2>Mon flux</h2>
    </div>
    <div class="row justify-content-center py-4">
        <a class="col-2 btn btn-outline-secondary me-3" href="{{ route('create_ticket') }}">Créer un ticket</a>
        <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('create_ticket_and_review') }}">Créer une critique</a>
    </div>
    @foreach($tickets_and_reviews as $instance)
        @if($instance instanceof App\Models\Ticket)
            <div class="row px-5 py-4">
                @include('rthome.partials.ticket_snippet', ['ticket' => $instance])
            </div>
        @elseif($instance instanceof App\Models\Review)
            <div class="row px-5 py-4">
                @include('rthome.partials.review_snippet', ['review' => $instance])
            </div>
        @endif
    @endforeach
</div>
@endsection
