@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col lg-12">
            <h1 style="text-align: center">All saved Pokemon!</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($pokemon as $pokemon)
        <div class="col">
            <div class="card mx-auto h-100">
                @include('partials.pokemon.card')
            </div>
        </div>
        @endforeach

      </div>

@endsection
