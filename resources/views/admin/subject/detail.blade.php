@extends('layouts.app')

@section('content')

<?php
//array de Meses
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

$diaDeSemana = $dias[ $tema->date->dayOfWeek ];
$dia = $tema->date->day;
$mes = $meses[ $tema->date->month -1 ];
$anio = $tema->date->year;
?>


<h2><b>Bimestre </b>{{$tema->bimester}} / <b>Unidad</b> {{$tema->unit}} </h2>
<h1><b>Tema: {{$tema->position}} </b> / {{$tema->name}}</h1>
<h5>Fecha: {{$diaDeSemana}}, {{$dia}} de {{$mes}} del {{$anio}}</h5>
<div class="content">
	<div class="card">
		<div class="row">
			<div class="col-6">
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="{{$video}}" allowfullscreen></iframe>
				</div>		
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="row">
		<div class="col-6">
			aqui los mensajes
		</div>
	</div>	
</div>





@endsection