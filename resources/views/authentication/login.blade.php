@extends('layout.app')

@section('content')
<div class="px-5 py-2 container">
    <div class="row pt-1 pb-3">
        <div class="row py-1">
            <p class="col text-start">{{ $message }}</p>
        </div>
    </div>
    <div class="row pt-1 pb-3">
        <div class="col pt-1 pb-3">
            <div class="px-5 py-2 container">
                <div class="row pt-1 pb-3">
                    <h3 class="col text-center">Inscrivez-vous maintenant</h3>
                </div>
                <div class="row py-1 justify-content-center">
                    <a class="col-2 btn btn-outline-secondary" href="{{ route('signup') }}">S'inscrire</a>
                </div>
            </div>
        </div>

        <div class="col pt-1 pb-3">
            <div class="px-5 py-2 container">
                <div class="row pt-1 pb-3">
                    <h3 class="col text-center">Connectez-vous</h3>
                </div>
                <form class="row pt-1 pb-3 justify-content-end" method="post">
                    @csrf
                    @foreach($form->getFields() as $field)
                        <div class="form-group col-12">
                            {{ $field->label(['class' => 'control-label']) }}
                            {{ $field->input(['class' => 'form-control']) }}
                            @if ($field->hasErrors())
                                <div class="alert alert-danger">
                                    {{ $field->error() }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <button class="col-3 btn btn-outline-secondary" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
