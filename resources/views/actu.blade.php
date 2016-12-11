@extends('layout.template')
@section('content')
<a href="{{ url('actu/cree') }}" class="btn btn-primary btn-lg active pull-right" style="margin-bottom: 15px;margin-right: 10px;" role="button">Crée un article</a>
<div class="row">
	@foreach($actus as $actu)
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{$actu->name}}</h3></div>

            <div class="panel-body">
           		{{$actu->article}}
            </div>
        </div>
    </div>
	@endforeach
</div>
@endsection