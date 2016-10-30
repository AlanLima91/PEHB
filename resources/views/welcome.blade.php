@extends('layout.template')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Portes de l'Essonne Handball
        </div>

        <div class="links">
            <a href="{{ url('actu') }}">Actualités</a>
            <a href="">équipes</a>
            <a href="">calendrier</a>
            <a href="">Résultats</a>
            <a href="">Connexion</a>
        </div>
    </div>
</div>
@endsection