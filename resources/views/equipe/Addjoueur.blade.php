@extends('layout.template')
@section('content')
<div class="panel-body">
	<form method = "post" action = "{{ url('equipe') }}">
		Nom : <input required type="text" name="name" id="name" value="">
		prenom : <input required type="text" name="prenom" id="prenom" value="">
		Licence :<input required type="number" name="licence" id="licence" value="">
		<button type='submit' class='btn btn-primary'>Envoyer</button>
	</form>
</div>
@endsection