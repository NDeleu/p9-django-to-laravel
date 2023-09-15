@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Suppression de la critique concernant le ticket sur {{ $ticket->title }} - {{ $ticket->author }}</h2>
    </div>
    <div class="row py-1">
        <p class="col text-center">Êtes-vous sûr de vouloir supprimer cette critique ?</p>
    </div>
    <form class="row py-1 justify-content-center" method="post">
        @csrf
        {!! Form::model($review, ['route' => ['delete_review', $ticket->id, $review->id], 'method' => 'delete']) !!}
        {!! Form::submit('Oui', ['class' => 'col-2 btn btn-outline-secondary me-3']) !!}
        <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('post_edit') }}">Non</a>
        {!! Form::close() !!}
    </form>
</div>
@endsection
