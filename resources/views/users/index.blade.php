@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col lg-12">
            <h1 style="text-align: center">All users</h1>
        </div>
    </div>
    @php
        $users = App\Models\User::all();
    @endphp

    @foreach ($users as $user)
        @include('partials.users.card')
    @endforeach
@endsection
