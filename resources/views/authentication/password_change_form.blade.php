@extends('layout.app')

@section('content')
    <div class="px-5 py-2 container">
        <div class="row pt-1 pb-3">
            <h2 class="col text-center">Changement de mot de passe</h2>
        </div>
        <form class="row pt-1 pb-3 justify-content-end" method="post">
            @csrf
            {{ $form->open() }}
            {{ $form->render() }}
            {{ $form->close() }}
            <button class="col-2 btn btn-outline-secondary" type="submit" >Changer le mot de passe</button>
        </form>
    </div>
@endsection
