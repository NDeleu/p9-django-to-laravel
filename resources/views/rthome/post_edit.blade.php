@extends('layout.app')

@section('content')
<div class="container text-center px-5">
    <div class="row py-4">
        <h2>Mes Posts</h2>
    </div>
    @foreach ($tickets_and_reviews as $instance)
        @if (@model_type($instance) == 'Ticket')
            <div class="row px-5 py-4">
                @include('rthome.partials.ticket_post_edit_snippet', ['ticket' => $instance])
            </div>
        @elseif (@model_type($instance) == 'Review')
            <div class="row px-5 py-4">
                @include('rthome.partials.review_post_edit_snippet', ['review' => $instance])
            </div>
        @endif
    @endforeach
</div>
@endsection
