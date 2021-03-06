@extends('layouts.app')

@section('content')

<div class="container-fluid bg-light p-5">
	
	<h1><i class="fas fa-file-alt"></i> Temas</h1>
	<div class="content">
		<div class="row">
			
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
					<th scope="col">Tema</th>
					<th scope="col">Bimestre</th>
					<th scope="col">Unidad</th>
					<th scope="col">Estado</th>
					<th scope="col">Fecha</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($temas as $tema)
				  		<tr>
				  			<td>
						      	<a href="{{route('temadetalle', ['tema_id'=>$tema->id])}}" style='font-size: 2.4em'>{{$tema->position}} - {{$tema->name}}
						      	</a>
						      	<p><span>Lunes, 8 de Agosto - 2020</span></p>
						      </td>
					      <th scope="row">
					      	Bimestre - {{$tema->bimester}}
					      </th>
					      <td>Unidad - {{$tema->unit}}</td>
					      <td>Pendiente</td>
					      <td><a href="{{route('temadetalle', ['tema_id'=>$tema->id])}}">Ver tema</a></td>
					    </tr>
			  	@endforeach
			  </tbody>
			</table>	

		</div>

		<div class="row">
			<div class="col-12 col-md-8">
				@foreach($bimestres as $key => $bimestre)
				<h2 class="text-success"><b>BIMESTRE {{$bimestre->bimester}}</b></h2>
					
					@foreach($unidades as $key => $unidad)
						<h3 class="text-success"><b>UNIDAD {{$unidad->unit}}</b></h3>
					@endforeach

				@endforeach
			</div>
			<div class="col-12 col-md-4">
				
			</div>
		</div>
			
	</div>

</div>


@endsection