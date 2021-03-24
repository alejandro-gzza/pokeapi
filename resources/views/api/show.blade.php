@extends('layouts.main')
@section('content_main')
    <div class="row">
        <div class="col">
            <h1 style="text-align: center">Show api</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mx-auto w-50">
                @include('partials.api.card')
            </div>
        </div>
    </div>

@endsection

