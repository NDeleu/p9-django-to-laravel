@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Inscription</h2>
    </div>
    <div class="row py-1">
        @if ($errors->any())
            <div class="col text-start">
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form class="row pt-1 pb-3 justify-content-end" method="post">
        @csrf
        {{ html()->formGroup(html()->label('Nom d\'utilisateur', 'username'), html()->text('username')->class('form-control')->required()) }}
        {{ html()->formGroup(html()->label('Adresse email', 'email'), html()->email('email')->class('form-control')->required()) }}
        {{ html()->formGroup(html()->label('Mot de passe', 'password'), html()->password('password')->class('form-control')->required()) }}
        {{ html()->formGroup(html()->label('Confirmer le mot de passe', 'password_confirmation'), html()->password('password_confirmation')->class('form-control')->required()) }}

        <div class="col-2 btn-group">
            <a class="btn btn-outline-secondary me-3" href="{{ route('login') }}">Retour</a>
            <button class="btn btn-outline-secondary" type="submit">S'inscrire</button>
        </div>
    </form>
</div>
@endsection
