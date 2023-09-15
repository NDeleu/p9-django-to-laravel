@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Créer un ticket</h2>
    </div>
    <form class="row pt-1 pb-3 justify-content-end" method="post" enctype="multipart/form-data">
        @csrf
        {!! html()->formGroup(html()->label('Titre', 'title'), html()->text('title')->class('form-control')->required()) !!}
        {!! html()->formGroup(html()->label('Description', 'description'), html()->textarea('description')->class('form-control')->required()) !!}
        {!! html()->formGroup(html()->label('Image', 'image'), html()->file('image')->class('form-control-file')) !!}
        <button class="col-2 btn btn-outline-secondary" type="submit">Publier</button>
    </form>
</div>
@endsection
