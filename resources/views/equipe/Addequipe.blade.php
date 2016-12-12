@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une équipe</div>
                <div class="panel-body">
					<form method = "post" action = "{{ url('equipe/Ajoutequipe') }}">

						<!-- <label for="ChampTexte">Descriptif :</label> 
						<input type="text" id="ChampTexte" />  -->

						<label for="name">Nom :</label> 
						<input type="text" required name="name" id="name" value="">
						</br></br>
						<label for="id">Catégorie : </label>
						<select id="id" name ="id"> <!-- On choisit parmi les catégories deja existante -->
						@if(!empty($resultats))
							@foreach($resultats as $key => $value)
								<option value ="{{$value->id_Categorie}}">{{$value->name}}</option>;
							@endforeach
						@endif
						</select>
						</br></br></br>
						<button type='submit' class='btn btn-primary' style="text-align:center">Envoyer</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection