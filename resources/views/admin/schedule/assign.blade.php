@extends('layouts.app')
@section('content')
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
						<div class="col mb-3">
							<div class="card h-100 mb-0">
								<div class="card-body">
									<h5 class="card-title">Nivel {{ $levelDegree->level->name }} - {{ $levelDegree->degree->name }}</h5>
									<h6>Cursos</h6>
									<ul class="list-inline">
										@foreach ($cursos as $curso)
										@if ($curso->verifyCourseInLevelDegree($docente->id,$levelDegree->level_id,$levelDegree->degree_id))
										<li class="course">
											<span>{{$curso->name}}</span>
											<button class="btn btn-primary btn-assign btn-sm" data-toggle="modal" data-target="#modalAssign"
											data-user_id="{{$docente->id}}"
											data-course_id="{{$curso->id}}"
											data-level_id="{{$levelDegree->level_id}}"
											data-degree_id="{{$levelDegree->degree_id}}"
											type="button"><i class="fa fa-plus pr-2"></i> Asignar</button>
										</li>
										@endif
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@if (!$loop->last)
					<hr>
					@endif
				</li>
				@empty
				<li class="text-muted">No se agregaron docentes.</li>
				@endforelse
			</ul>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAssign" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form class="modal-content" action="{{ route('assign.store') }}" method="POST" id="frmAssign">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">{{$title}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					@csrf
					<ul class="list-inline" id="hoursAccordion">
						@forelse ($days as $day)
						<li class="card mb-1">
							<div class="card-header" id="heading{{$day->id}}">
								<span class="text-primary d-flex py-1" data-toggle="collapse"
								data-target="#collapse{{$day->id}}" aria-expanded="false" aria-controls="collapse{{$day->id}}" style="cursor: pointer;">{{ $day->name }} <i class="fa fa-angle-down ml-auto"></i></span>
							</div>
							<div id="collapse{{$day->id}}" class="collapse" aria-labelledby="heading{{$day->id}}" data-parent="#hoursAccordion">
								<div class="card-body pt-1">
									<p class="mb-1"><strong>Horas</strong></p>
									<ul class="list-inline row" style="font-size: 12px;">
										@forelse ($hours as $hour)
										<li class="col-12 col-md-4 col-lg-3">
											<input type='hidden' name='dayhour[{{$day->id}}][user_id]' class="input_user_id" value="" />
											<input type='hidden' name='dayhour[{{$day->id}}][course_id]' class="input_course_id" value="" />
											<input type='hidden' name='dayhour[{{$day->id}}][level_id]' class="input_level_id" value="" />
											<input type='hidden' name='dayhour[{{$day->id}}][degree_id]' class="input_degree_id" value="" />
											<input type='hidden' name='dayhour[{{$day->id}}][hour_id]' class="input_hour_id" value="{{$hour->id}}" />
											<input type="checkbox" name="dayhour[{{$day->id}}][day_id]" class="input_day_id" id="hour_{{$day->id.$hour->id}}" value="{{$day->id}}">
											<label class="align-middle pl-1" for="hour_{{$day->id.$hour->id}}">{{$hour->name}}</label>
										</li>
										@empty
										<li class="text-muted">No hay horas ingresadas.</li>
										@endforelse
									</ul>
								</div>
							</div>
						</li>
						@empty
						<li class="text-muted">No hay días ingresados.</li>
						@endforelse
					</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					<i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
				</button>
				<button type="submit" class="btn btn-primary btn-assign-hour">
					<i class="fa fa-plus mr-2" style='font-size: 14px;'></i>Asignar
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		$('#modalAssign').on('show.bs.modal', function (event) {
			var btn = $(event.relatedTarget);
			$('.input_user_id').val(btn.data('user_id'))
			$('.input_course_id').val(btn.data('course_id'))
			$('.input_level_id').val(btn.data('level_id'))
			$('.input_degree_id').val(btn.data('degree_id'))
		})
		$('#modalAssign').on('hide.bs.modal', function (event) {
			var btn = $(event.relatedTarget);
			$('.input_user_id').val('')
			$('.input_course_id').val('')
			$('.input_level_id').val('')
			$('.input_degree_id').val('')
		})
		$('#frmAssign').submit(function (event) {
			event.preventDefault();
			var form = $(this);
			var url = form.attr('action');
			$.ajax({
				type: "post",
				url: url,
				data: new FormData(this),
				processData: false,
				contentType: false,
				complete: function () {
					$('.modal.show').modal('hide');
				},
				beforeSend: function() {
					$('.btn-assign-hour').attr('disabled', true);
				},
				success: function(response) {
					$('.btn-assign-hour').attr('disabled', false);
					if (response.success) {
						
					}
				},
				error: function(request, status, error) {
					$('.btn-assign-hour').attr('disabled', false);
				}
			});
		})
	})
</script>
@endsection