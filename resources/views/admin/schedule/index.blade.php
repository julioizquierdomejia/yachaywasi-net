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
		<div class="buttons col-12 col-md-4 text-center text-md-right">
			<a class="btn btn-primary" href="{{route('schedule.assign')}}">Asignar horario</a>
		</div>
	</div>

		<table class="table table-bordered">
			<thead>
				<tr class="text-center text-white" style="background-color: #006DB0">
					<th scope="row" style="background-color: #005081;"></th>
					<th scope="col">Lunes</th>
					<th scope="col">Martes</th>
					<th scope="col">Miercoles</th>
					<th scope="col">Jueves</th>
					<th scope="col">Viernes</th>
				</tr>
			</thead>
			<tbody>
				
				<tr class="text-center" style="background-color: #C7EAFF">
					<th scope="row">7:40 - 8:00</th>
					<td colspan="5" style="font-weight: bold;">FORMACIÓN</td>
				</tr>

				<tr class="text-center">	
					<th scope="row">8:00 - 8:40</th>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #D9CA11 ">Ingles</a>
						<br>
						<span class="d-block">Miss Abby</span><br>
						<span>ID : 987 656 743</span><br>
						<span>Clave : ingles</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #D9CA11 ">Ingles</a>
						<br>
						<span>Miss Abby</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
				</tr>

				<tr class="text-center">	
					<th scope="row">8:40 - 9:20</th>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #D9CA11 ">Ingles</a>
						<br>
						<span>Miss Abby</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #D9CA11 ">Ingles</a>
						<br>
						<span>Miss Abby</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
				</tr>

				<tr class="text-center">	
					<th scope="row">9:20 - 10:00</th>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FFA51C ">Personal Social</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #16C286 ">Ciencia y Ambiente</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FFA51C ">Personal Social</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
				</tr>

				<tr class="text-center">	
					<th scope="row">10:00 - 10:40</th>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FFA51C ">Personal Social</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #3B98F5 ">Matemática</a>
						<br>
					 	<span>Miss Carmela</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #16C286 ">Ciencia y Ambiente</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #D3D2D2; color: black; ">Religión</a>
						<br>
					 	<span>Prof. Julio</span>
					</td>
					
				</tr>

				<tr class="text-center" style="background-color: #C7EAFF">
					<th scope="row">10:40 - 11:20</th>
					<td colspan="5" style="font-weight: bold;">RECREO</td>
					
				</tr>

				<tr class="text-center">
					<th scope="row">10:00 - 10:40</th>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #F74C1E;">Música</a>
						<br>
					 	<span>Prof. Julio</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #B42BC4 ">Taekwondo</a>
						<br>
					 	<span>Miss Wendy</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #16C286 ">Ciencia y Ambiente</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
					<td>
						<a href="" class="btn btn-sm" style="background-color: #FF86CF ">Comunicación</a>
						<br>
					 	<span>Miss Romina</span>
					</td>
				</tr>


			</tbody>
		</table>

@endsection