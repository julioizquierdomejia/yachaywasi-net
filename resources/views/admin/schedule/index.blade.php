@extends('layouts.app')

@section('content')

	@if($rol == 'admin')
		<!-- HORARIO DE 4 AÑOS -->
		<div class="page-title row">
			<div class="p-title col-12 col-md-8">
				<h1>Horario 4 años</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.4anios')

		<!-- HORARIO DE 5 AÑOS -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario 5 años</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.5anios')

		<!-- HORARIO DE Primera Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 1er Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.primero')

		<!-- HORARIO DE segundo Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 2do Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.segundo')

		<!-- HORARIO DE Tercer Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 3er Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.tercero')

		<!-- HORARIO DE Cuarto Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 4to Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.cuarto')

		<!-- HORARIO DE Quinto Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 5to Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.quinto')

		<!-- HORARIO DE Sexto Grado -->
		<div class="page-title row mt-5">
			<div class="p-title col-12 col-md-8">
				<h1>Horario - 6to Grado</h1>
			</div>
		</div>
		@include('admin.schedule.horarios.sexto')

	@else

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

	@endif
	
	



@endsection