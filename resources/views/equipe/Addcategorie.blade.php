@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une catégorie</div>
                <div class="panel-body">
					<form method = "post" action = "{{ url('equipe/Ajoutcategorie') }}">
						Nom : <input required type="text" name="name" id="name" value="">
						<button type='submit' class='btn btn-primary'>Envoyer</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection