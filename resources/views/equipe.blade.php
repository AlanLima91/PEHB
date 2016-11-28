@extends('layout.template')
@section('content')

<a href="{{ url('equipe/Ajoutcategorie') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 15px;" role="button">Crée une catégorie</a>
<!-- <div class="panel-body">
	<form method = "post" action = "{{ url('equipe') }}">
		Nom : <input required type="text" name="name" id="name" value="">
		<button type='submit' class='btn btn-primary'>Envoyer</button>
	</form>
</div> -->
<!-- <a href="{{ url('equipe/Addequipe') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée une équipe</a> -->
<!-- <a href="{{ url('equipe/Addjoueur') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un joueur</a> -->
@endsection