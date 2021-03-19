@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col">
            <h1 style="text-align: center">Show</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mx-auto w-50">
            <img src="{{$pokemon->front_img}}" class="img-thumbnail" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$pokemon->name}}</h5>
                <p class="card-text">Weight: {{$pokemon->weight}}</p>
                <p class="card-text">Height: {{$pokemon->height}}</p>
                <p class="card-text">Type: {{$pokemon->type}}</p>
                <p class="card-text">HP: {{$pokemon->hp}}</p>
                <p class="card-text">Attack: {{$pokemon->attack}}</p>
                <p class="card-text">Defense: {{$pokemon->defense}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Pokemon ID: {{$pokemon->pokemon_id}}</small>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center py-4">
                <a href="{{ route('pokemon.edit', $pokemon->id ) }}" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Edit</a>
    </div>



@endsection
