@extends('layout.template')
@section('content')
<div class="content">
	@foreach($infos as $key =>$value )
		<div class="col-md-6">
			<label>{{$key}}</label>
			<input value="{{$value}}">
		</div>
	@endforeach
</div>
@endsection