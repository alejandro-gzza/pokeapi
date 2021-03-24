@extends('layouts.main')
@section('content_main')
    <form action="{{route('pokemon.api.store')}}" method="POST">
        @csrf
        @include('partials.pokemon.form_api')
    </form>
@endsection
