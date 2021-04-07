@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col">
            <h1>Show</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mx-auto w-50">
                @include('partials.pokemon.card')
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center py-4">
                <a href="{{ route('pokemon.edit', $pokemon->id ) }}" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Edit</a>
    </div>



@endsection
