@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une équipe</div>
                <div class="panel-body">
					<form method = "post" action = "{{ url('equipe/Ajoutjoueur') }}">
						Nom : <input required type="text" name="name" id="name" value="name">
						prenom : <input required type="text" name="prenom" id="prenom" value="prenom">
						Licence :<input required type="number" name="licence" id="licence" value="licence">
						Année de Naissance :<input required type ="number" name="year" id="year" value ="year">
						Equipe : <select name ="id">
						@if(!empty($resultats))
							@foreach($resultats as $key => $value) 
								<option value ="{{$value->id_Equipe}}">{{$value->name}}</option>;
							@endforeach
						@endif
						</select>
						<button type='submit' class='btn btn-primary'>Envoyer</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection