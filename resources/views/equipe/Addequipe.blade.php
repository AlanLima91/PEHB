@extends('layout.template')
@section('content')
<div class="panel-body">
	<form method = "post" action = "{{ url('equipe') }}">
		Nom : <input required type="text" name="name" id="name" value="">
		<button type='submit' class='btn btn-primary'>Envoyer</button>
	</form>
</div>
@endsection