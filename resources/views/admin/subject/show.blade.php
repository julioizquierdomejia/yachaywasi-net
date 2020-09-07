@extends('layouts.app')

@section('content')

<?php
//array de Meses
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

$diaDeSemana = $dias[ $tema->date->dayOfWeek -1 ];
$dia = $tema->date->day;
$mes = $meses[ $tema->date->month -1 ];
$anio = $tema->date->year;
?>



<h2><b>Bimestre </b>{{$tema->bimester}} / <b>Unidad</b> {{$tema->unit}} </h2>
<h1><b>Tema: {{$tema->position}} </b> / {{$tema->name}}</h1>
<h5>Fecha: {{$diaDeSemana}}, {{$dia}} de {{$mes}} del {{$anio}}</h5>

<div class="row">
	<div class="col-6">
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$videoKey}}" allowfullscreen></iframe>
		  <!--iframe width="1070" height="602" src="https://www.youtube.com/embed/4xCtUN0XhQw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->
		<!--
		  https://www.youtube.com/embed/4xCtUN0XhQw
		  https://www.youtube.com/embed?v=4xCtUN0XhQw

		-->
		</div>		
	</div>
</div>




@endsection