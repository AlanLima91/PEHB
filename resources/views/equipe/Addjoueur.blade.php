@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une équipe</div>
                <div class="panel-body">
					<form method = "post" action = "{{ url('equipe') }}">
						Nom : <input required type="text" name="name" id="name" value="">
						prenom : <input required type="text" name="prenom" id="prenom" value="">
						Licence :<input required type="number" name="licence" id="licence" value="">
						Equipe : <select name ="id">
							<?php
								$resultats = controller::selectAllequipe();
								foreach ($resultats as $resultats) 
								{
									echo"<option value =".$resultats['id'].">".$resultats['name']."</option>";
								}
							?>
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