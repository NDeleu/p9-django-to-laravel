@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Suppression de l'abonnement avec {{ $following->followed_user_name }}</h2>
    </div>
    <div class="row py-1">
        <p class="col text-center">Êtes-vous sûr de vouloir supprimer votre abonnement ?</p>
    </div>
    <form class="row py-1 justify-content-center" method="post">
        @csrf
        {!! Form::model($following, ['route' => ['delete_follow', $following->id], 'method' => 'delete']) !!}
        {!! Form::submit('Oui', ['class' => 'col-2 btn btn-outline-secondary me-3']) !!}
        <a class="col-2 btn btn-outline-secondary ms-3" href="{{ route('follow_users') }}">Non</a>
        {!! Form::close() !!}
    </form>
</div>
@endsection
