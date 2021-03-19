@extends('layouts.main')
@section('content_main')
    <form action="{{route('pokemon.store')}}" method="POST">
        @csrf
        @include('partials.pokemon.form', ['edit' => false])
    </form>
@endsection
