@extends('layout.template')
@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Dernier Resultats</div>
        	<div class="panel-body">
        		@foreach($Result as $key)
    				<div class="col-md-10 col-md-offset-1">
    				    <div class="panel panel-default">
    				        <div class="panel-heading"><h3>Contre {{$key->Adversaire}}</h3></div>
				
    				        <div class="panel-body">
    				       		{{$key->score}}
    				        </div>
    				    </div>
    				</div>
				@endforeach
        	</div>
        </div>
    </div>
</div>


@endsection