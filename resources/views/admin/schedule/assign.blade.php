@extends('layouts.app')
@section('content')
@php
$days = [
'Lunes',
'Martes',
'Miércoles',
'Jueves',
'Viernes',
'Sábado',
'Domingo',
]
@endphp
<div class="schedule">
	<h5>{{$title}}</h5>
	<div class="card">
		<div class="card-body">
			<ul class="list list-inline pl-4">
				@forelse ($docentes as $docente)
				<li>
					<h5>{{$docente->name}}</h5>
					@php
					$levelDegrees = \App\DegreeLevelUser::where('user_id', $docente->id)->get();
					@endphp
					<div class="row row-cols-1 row-cols-md-3">
						@foreach($levelDegrees as $levelDegree)
						<div class="col">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Nivel {{ $levelDegree->level->name }} - {{ $levelDegree->degree->name }}</h5>
									<h6>Cursos</h6>
									@foreach ($cursos as $curso)
									@if ($curso->verifyCourseInLevelDegree($docente->id,$levelDegree->level_id,$levelDegree->degree_id))
									<div class="course">
										{{$curso->name}}
										<button class="btn btn-primary btn-assign btn-sm" data-toggle="modal" data-target="#modalAssign" type="button"><i class="fa fa-plus pr-2"></i> Asignar</button>
									</div>
									@endif
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<hr>
				</li>
				@empty
				@endforelse
			</ul>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAssign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">{{$title}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul class="list-inline">
					@for ($i = 0; $i < 7; $i++)
					<li>
						<div class="card card-body py-0">
							<span class="text-primary d-flex py-1" data-toggle="collapse"
							data-target="#collapseD{{$i}}" aria-expanded="false" aria-controls="collapseD{{$i}}" style="cursor: pointer;">{{ $days[$i] }} <i class="fa fa-angle-down ml-auto"></i></span>
							<div class="collapse" id="collapseD{{$i}}">
								<h6>Horas</h6>
								<ul class="list-inline row">
									@for ($j = 8; $j <= 12; $j++)
									<li class="col-4 col-md-3">
										<input type="checkbox" name="day[{{$i}}][1]" id="hour_{{$i}}_{{$j}}">
										<label for="hour_{{$i}}_{{$j}}">{{$j}} am</label>
									</li>
									@endfor
								</ul>
							</div>
						</div>
					</li>
					@endfor
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
				<i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
				</button>
				<button type="button" class="btn btn-primary btn-assign-hour">
				<i class="fa fa-plus mr-2" style='font-size: 14px;'></i>Asignar
				</button>
			</div>
		</div>
	</div>
</div>
@endsection