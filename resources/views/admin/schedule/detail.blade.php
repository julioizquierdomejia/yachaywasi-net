@extends('layouts.app')
@section('content')
<div class="schedule">
	<h5>Asignación de Horas</h5>
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
@endsection