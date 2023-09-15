@extends('layout.app')

@section('content')
<div class="container px-5 py-2">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Onglet d'abonnements</h2>
    </div>

    <div class="row pt-3 pb-1">
        <h4 class="col text-center">Suivre d'autres utilisateurs</h4>
    </div>
    <form class="row pt-1 pb-3 justify-content-center" method="post">
        @csrf
        {!! Form::open(['route' => 'follow_users_store']) !!}
        {{ Form::text('follows', null, ['class' => 'col-8 form-control']) }}
        {!! Form::submit('Confirmer', ['class' => 'col-2 btn btn-outline-secondary']) !!}
        {!! Form::close() !!}
    </form>

    <div class="row pt-3 pb-1">
        <h4 class="col text-center">Abonnements</h4>
    </div>
    <div class="row py-1">
        <div class="px-5 py-2 container">
            @foreach($followingAll as $following)
                <div class="row border border-secondary">
                    <p class="col-10">{{ $following->followed_user_name }}</p>
                    <a class="col-2 text-center btn btn-outline-secondary" href="{{ route('delete_follow', ['following_id' => $following->id]) }}">Désabonner</a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row pt-3 pb-1">
        <h4 class="col text-center">Abonnés</h4>
    </div>
    <div class="row py-1">
        <div class="px-5 py-2 container">
            @foreach($followedByAll as $followedBy)
                <div class="row border border-secondary">
                    <p class="col">{{ $followedBy->user_name }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row pt-3 pb-1 justify-content-center">
        <a class="col-2 btn btn-outline-secondary" href="{{ route('home') }}">Retour au flux</a>
    </div>
</div>
@endsection
