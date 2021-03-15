@extends('layouts.app')

@section('content')
	
	<div class="page-title row">
		<div class="p-title col-12 col-md-8">
			<h1>Horario</h1>
		<h2>{{$grado}} de {{$nivel}}</h2>
		@if($rol == 'editor')
			<h3>Maestro</h3>
		@else
			<h3>Alumno</h3>
		@endif
		</div>
	</div>

	@if($grado == '4 años')
		@include('admin.schedule.horarios.4anios')
	@endif

	@if($grado == '5 años')
		@include('admin.schedule.horarios.5anios')
	@endif

	@if($grado == '1er Grado')
		@include('admin.schedule.horarios.primero')
	@endif

	@if($grado == '2do Grado')
		@include('admin.schedule.horarios.segundo')
	@endif

	@if($grado == '3er Grado')
		@include('admin.schedule.horarios.tercero')
	@endif

	@if($grado == '4to Grado')
		@include('admin.schedule.horarios.cuarto')
	@endif

	@if($grado == '5to Grado')
		@include('admin.schedule.horarios.quinto')
	@endif

	@if($grado == '6to Grado')
		@include('admin.schedule.horarios.sexto')
	@endif

@endsection