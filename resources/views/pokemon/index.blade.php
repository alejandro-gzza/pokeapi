@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col lg-12">
            <h1 style="text-align: center">All saved Pokemon!</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($pokemon as $pokemons)
        <div class="col">
            <div class="card mx-auto h-100">

            <img src="{{$pokemons->front_img}}"  class="img-thumbnail" alt="...">
            <div class="card-body">
                <a href="{{ route('pokemon.show', ['pokemon_id'=> $pokemons->id]) }}">
                    <h5 class="card-title">{{$pokemons->name}}</h5>
                </a>
                <p class="card-text">Weight: {{$pokemons->weight}}</p>
                <p class="card-text">Height: {{$pokemons->height}}</p>
                <p class="card-text">Type: {{$pokemons->type}}</p>
                <p class="card-text">HP: {{$pokemons->hp}}</p>
                <p class="card-text">Attack: {{$pokemons->attack}}</p>
                <p class="card-text">Defense: {{$pokemons->defense}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Pokemon ID: {{$pokemons->pokemon_id}}</small>
            </div>
            </div>
        </div>
        @endforeach

      </div>

@endsection
