@extends('layouts.main')
@section('content_main')
    <form action="{{route('pokemon.update', [$pokemon->id])}}" method="POST">
        @csrf
        @include('partials.pokemon.form', ['edit' => true])
    </form>
    <form action="{{route('pokemon.delete', [$pokemon->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
    </form>
@endsection
