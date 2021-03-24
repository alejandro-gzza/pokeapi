@extends('layouts.main')
@section('content_main')
    <form action="{{route('users.pokemon.store', $user_id)}}" method="POST">
        @csrf
        @include('partials.users.form')
    </form>
@endsection
