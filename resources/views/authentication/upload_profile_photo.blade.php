@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Téléverser une photo de profil</h2>
    </div>
    <form class="row pt-1 pb-3 justify-content-end" method="post" enctype="multipart/form-data">
        @csrf
        {!! html()->formGroup(html()->label('Photo de profil', 'profile_photo'), html()->file('profile_photo')->class('form-control-file')->required()) !!}
        <button class="col-2 btn btn-outline-secondary" type="submit">Publier</button>
    </form>
</div>
@endsection
