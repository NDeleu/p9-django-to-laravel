@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Créer un ticket et une critique</h2>
    </div>

    <form class="row pt-1 pb-3" method="post" enctype="multipart/form-data">
        @csrf

        <div class="px-5 py-2 container border border-2 border-secondary">
            <div class="row py-1">
                <h3 class="col">Ticket</h3>
            </div>
            <div class="row py-1">
                {!! html()->formGroup(html()->label('Titre', 'ticket_title'), html()->text('ticket_title')->class('form-control')->required()) !!}
                {!! html()->formGroup(html()->label('Description', 'ticket_description'), html()->textarea('ticket_description')->class('form-control')->required()) !!}
                {!! html()->formGroup(html()->label('Image', 'ticket_image'), html()->file('ticket_image')->class('form-control-file')) !!}
            </div>
        </div>

        <div class="px-5 py-2 container border border-2 border-secondary">
            <div class="row py-1">
                <h3 class="col">Critique</h3>
            </div>
            <div class="row py-1">
                {!! html()->formGroup(html()->label('Titre', 'review_headline'), html()->text('review_headline')->class('form-control')->required()) !!}
                {!! html()->formGroup(html()->label('Note', 'review_rating'), html()->number('review_rating')->class('form-control')->required()) !!}
                {!! html()->formGroup(html()->label('Commentaire', 'review_body'), html()->textarea('review_body')->class('form-control')->required()) !!}
            </div>
            <div class="row py-1 justify-content-end">
                <button class="col-2 btn btn-outline-secondary" type="submit">Publier</button>
            </div>
        </div>
    </form>
</div>
@endsection
