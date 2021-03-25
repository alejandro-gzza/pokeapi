@extends('layouts.main')
@section('content_main')

<div class="row">
    <div class="col lg-12">
        <h1 style="text-align: center">Add a new Pokémon</h1>
    </div>
</div>

    <form action="{{route('pokemon.api.store')}}" method="POST">
        @csrf
        @include('partials.pokemon.form_api')
    </form>
@endsection
