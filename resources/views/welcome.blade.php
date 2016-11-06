@extends('layout.template')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Portes de l'Essonne Handball
        </div>

        <div class="links">
            <a href="{{ url('actu') }}">Actualités</a>
            <a href="{{ url('equipe') }}">équipes</a>
            <a href="{{ url('calendrier') }}">calendrier</a>
            <a href="{{ url('resultats') }}">Résultats</a>
            <a href="{{ url('connexion') }}">Connexion</a>
            <a href="{{ url('information') }}">Informations</a>
        </div>
    </div>
</div>
@endsection