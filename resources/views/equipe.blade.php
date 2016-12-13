@extends('layout.template')
@section('content')

<a href="{{ url('equipe/Ajoutcategorie') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 15px;" role="button">Crée une catégorie</a>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0" style="text-align:center">
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
                                        @foreach($Equipe as $key2)
                                            @if($key2->id_Categorie == $key->id_Categorie)
                                            <div class="col-md-10 col-md-offset-0">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading"><h5>{{$key2->name}}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <a href="{{ url('equipe/Ajoutjoueur') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un joueur</a>
                                                        @foreach($Joueur as $key3)
                                                            @if($key2->id_Equipe == $key3->id_Equipe)
                                                                <a href="{{ url('equipe/joueur/'.$key3->Licence)}}">{{$key3->Nom}} {{$key3->Prenom}}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
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