@extends('layout.template')
@section('content')

<a href="{{ url('equipe/Ajoutcategorie') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 15px;" role="button">Crée une catégorie</a>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Les catégories</div>
                	<div class="panel-body">
						<a href="{{ url('equipe/Ajoutequipe') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée une équipe</a>
						<a href="{{ url('equipe/Ajoutjoueur') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un joueur</a>
                	</div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection