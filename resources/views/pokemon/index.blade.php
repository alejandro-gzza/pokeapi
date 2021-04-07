@extends('layouts.main')
@push('scripts')
    <script type="text/javascript" src="{{ mix('/js/pokemon/index.js') }}"></script>
@endpush
@section('content_main')
    <div class="row">
        <div class="col lg-12">
            <h1 class="title" id="index">All saved Pokémon!</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($pokemons as $pokemon)
        <div class="col">
            <div class="card mx-auto h-100">
                @include('partials.pokemon.card')
            </div>
        </div>
        @endforeach

    </div>

@endsection
