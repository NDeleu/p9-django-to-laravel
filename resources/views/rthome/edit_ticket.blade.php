@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <h2 class="col text-center">Modification du ticket sur {{ $ticket->title }} - {{ $ticket->author }}</h2>
    </div>
    <form class="row pt-1 pb-3 justify-content-end" method="post" enctype="multipart/form-data">
        @csrf
        {{ Form::model($formModel, ['route' => ['update_ticket', $ticket->id]]) }}
        {{ method_field('PATCH') }}
        @include('rthome.form.ticket_form')
        <button class="col-2 btn btn-outline-secondary" type="submit">Modifier</button>
        {{ Form::close() }}
    </form>
</div>
@endsection
