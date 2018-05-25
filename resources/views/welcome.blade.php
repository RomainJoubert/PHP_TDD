@extends('layouts.app')
@section('content')
    {{--<div class="flex-center position-ref full-height">--}}
    {{--@if (Route::has('login'))--}}
    {{--<div class="top-right links">--}}
    {{--@auth--}}
    {{--<a href="{{ url('/home') }}">Home</a>--}}
    {{--@else--}}
    {{--<a href="{{ route('login') }}">Login</a>--}}
    {{--<a href="{{ route('register') }}">Register</a>--}}
    {{--@endauth--}}
    {{--</div>--}}
    {{--@endif--}}

    <div class="content">
        <div class="title m-b-md">
            Bienvenue sur LE site de financement de projet
        </div>
        <img class= "image1" src="/img/solidarite.jpg">
        <h1><a href="/project">Liste des projets</a></h1>
        <h1><a href="/formulaire_projet">Créer un projet</a></h1>
    </div>

@endsection

