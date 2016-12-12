@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter un joueur</div>
                <div class="panel-body">
					<form method = "post" action = "{{ url('equipe/Ajoutjoueur') }}">
						<label for ="name">Nom : </label>
						<input type="text" required name="name" id="name" placeholder="Entrez le Nom" value=""></br></br>
						<label for ="prenom">prenom : </label>
						<input type="text" required name="prenom" id="prenom" placeholder="Entrez le Prénom" value=""></br></br>
						<label for ="licence">Licence : </label>
						<input type="number" required name="licence" id="licence" value="" pattern=".{13,13}" required title="Une licence contient 13 chiffres."></br></br>
						<label for ="year">Année de Naissance : </label>
						<input type ="number" required name="year" id="year" value =""></br></br>
						<label for ="id">Equipe : </label>
						<select id ="id" name ="id">
						@if(!empty($resultats))
							@foreach($resultats as $key => $value) 
								<option value ="{{$value->id_Equipe}}">{{$value->name}}</option>;
							@endforeach
						@endif
						</select></br></br>
						<button type='submit' class='btn btn-primary'>Envoyer</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection