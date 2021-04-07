@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col">
            <h1>User #{{ $user_id }}</h1>
        </div>
        <div class="col">
            <a href="{{ route('users.pokemon.create', $user_id ) }}" class="btn btn-warning btn-lg active btn-block" role="button" aria-pressed="true">Add pokemon</a>
</div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($user->pokemon as $pokemon)
        <div class="col">
            <div class="card mx-auto h-100">
                @include('partials.pokemon.card')
            </div>
        </div>
        @endforeach

      </div>

@endsection
