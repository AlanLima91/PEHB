@extends('layout.template')
@section('content')

<a href="{{ url('equipe/Ajoutcategorie') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 15px;" role="button">Crée une catégorie</a>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Les catégories</h3></div>
                	<div class="panel-body">
                        @foreach($Categorie as $key)
                            <div class="col-md-5 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4>{{$key->name}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <a href="{{ url('equipe/Ajoutequipe') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée une équipe</a>
                                        @foreach($Equipe as $key)
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading"><h5>{{$key->name}}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <a href="{{ url('equipe/Ajoutjoueur') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un joueur</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                	</div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection