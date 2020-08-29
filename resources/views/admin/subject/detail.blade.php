@extends('layouts.app')

@section('content')
<h2><b>Bimestre </b>{{$tema->bimester}} / <b>Unidad</b> {{$tema->unit}} </h2>
<h1><b>Tema: {{$tema->position}} </b> / {{$tema->name}}</h1>
<h5>Tema: {{$tema->date}}</h5>
<div class="row">
	<div class="col-6">
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="{{$video}}" allowfullscreen></iframe>
		</div>		
	</div>
</div>


@endsection