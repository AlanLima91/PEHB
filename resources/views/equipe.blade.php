@extends('layout.template')
@section('content')

<a href="{{ url('equipe/Ajoutcategorie') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 15px;" role="button">Crée une catégorie</a>
<a href="{{ url('equipe/Ajoutequipe') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée une équipe</a>
<a href="{{ url('equipe/Ajoutjoueur') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un joueur</a>
<div class="container">
    <div class="row">
    <div class="col-md-12 col-md-offset-0" style="text-align:center">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Les catégories</h3></div>
            	<div class="panel-body ">
                    @foreach($Categorie as $key)
                        <div class="panel panel-default">
                            <button class="accordion panel-heading">{{$key->name}}</button>
                            <div class="panel2 panel-body">                                
                                @foreach($Equipe as $key2)
                                    @if($key2->id_Categorie == $key->id_Categorie)
                                    <div class="panel panel-default" style="margin-top: 20px;">
                                        <button class="accordion panel-heading" >{{$key2->name}}</button>
                                        <div class="panel2 panel-body">
                                            @foreach($Joueur as $key3)
                                                @if($key2->id_Equipe == $key3->id_Equipe)
                                                    <a href="{{ url('equipe/joueur/'.$key3->Licence)}}">{{$key3->Nom}} {{$key3->Prenom}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
            	</div>
            </div>
        </div>
	</div>
</div>
@endsection
<style type="text/css">
    
button.accordion {
    background-color: #f5f5f5;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 20px;
    transition: 0.4s;
    font: bold;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd; 
}
div.panel2 {
    padding: 0 18px;
    display: none;
    background-color: white;
}

div.panel2.panel-body.show {
    display: block;
}
</style>
@section('script')
<script>
$(function() {
var acc = document.getElementsByClassName("accordion");
for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
    }
}
});
</script>
@endsection