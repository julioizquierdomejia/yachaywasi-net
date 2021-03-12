@extends('layouts.app')
@section('content')
<div class="schedule">
	<h5>{{$title}}</h5>
	<div class="card">
		<div class="card-body">
			<ul class="list list-inline">
				@forelse ($docentes as $docente)
				<li class="list-item docente-item">
					<h5 class="docente-name">{{$docente->name}}</h5>
					@php
					$levelDegrees = \App\DegreeLevelUser::where('user_id', $docente->id)->get();
					@endphp
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
						@foreach($levelDegrees as $levelDegree)
						<div class="col mb-3">
							<div class="card h-100 mb-0">
								<div class="card-body">
									<h5 class="card-title">Nivel {{ $levelDegree->level->name }} - {{ $levelDegree->degree->name }}</h5>
									<h6>Cursos</h6>
									<ul class="list-inline">
										@foreach ($cursos as $curso)
										@if ($curso->verifyCourseInLevelDegree($docente->id,$levelDegree->level_id,$levelDegree->degree_id))
										<li class="course row align-items-center">
											<span class="course-name col-6">- {{$curso->name}}</span>
											<span class="col-6 text-right">
											<button class="btn btn-primary btn-assign btn-sm my-1" data-toggle="modal" data-target="#modalAssign"
											data-user_id="{{$docente->id}}"
											data-course_id="{{$curso->id}}"
											data-level_id="{{$levelDegree->level_id}}"
											data-degree_id="{{$levelDegree->degree_id}}"
											type="button" style="font-size: 11px"><i class="fa fa-plus pr-2"></i> Asignar</button>
											</span>
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
				<div class="hours-container" style="font-size: 13px">
					<p class="mb-0"><span class="docente-name"></span></p>
					<p class="mb-0"><span class="degree-name"></span></p>
					<p class="mb-0"><span class="course-name"></span></p>
					<ul class="list-inline hours-list mb-0"></ul>
				</div>
				@csrf
				<ul class="list-inline" id="hoursAccordion">
					@forelse ($days as $key => $day)
					<li class="card mb-1">
						<div class="card-header" id="heading{{$day->id}}">
							<span class="text-primary d-flex py-1" data-toggle="collapse"
							data-target="#collapse{{$day->id}}" aria-expanded="false" aria-controls="collapse{{$day->id}}" style="cursor: pointer;">{{ $day->name }} <i class="fa fa-angle-down ml-auto"></i></span>
						</div>
						<div id="collapse{{$day->id}}" class="collapse" aria-labelledby="heading{{$day->id}}" data-parent="#hoursAccordion">
							<div class="card-body pt-1">
								<p class="mb-1"><strong>Horas</strong></p>
								<ul class="list-inline row" style="font-size: 13px;margin: 0 -10px;">
									@forelse ($hours as $hkey => $hour)
									<li class="col-6 col-md-4 col-lg-3" style="padding: 0 10px;">
										<input type='hidden' name="" data-name='dayhour[{{$day->id.$hour->id}}][user_id]' class="input_user_id" value="" />
										<input type='hidden' name="" data-name='dayhour[{{$day->id.$hour->id}}][course_id]' class="input_course_id" value="" />
										<input type='hidden' name="" data-name='dayhour[{{$day->id.$hour->id}}][level_id]' class="input_level_id" value="" />
										<input type='hidden' name="" data-name='dayhour[{{$day->id.$hour->id}}][degree_id]' class="input_degree_id" value="" />
										<input type="checkbox" name="" data-name="dayhour[{{$day->id.$hour->id}}][day_id]" class="frm-input input_day_id" id="hour_{{$day->id.$hour->id}}" value="{{$day->id}}">
										<input type='hidden' name="" data-name='dayhour[{{$day->id.$hour->id}}][hour_id]' class="input_hour_id" value="{{$hour->id}}" />
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
		function getList(user_id, course_id, level_id, degree_id) {
			$.ajax({
				type: "get",
				url: '{{ route('assign.list') }}',
				data: {
					_token: '{{csrf_token()}}',
					'user_id': user_id,
					'course_id': course_id,
					'level_id': level_id,
					'degree_id': degree_id,
				},
				beforeSend: function() {
					
				},
				success: function(response) {
					if (response.success) {
						data = $.parseJSON(response.data);
						if(data) {
							$.each(data, function (id, item) {
								$('[data-name="dayhour['+item.day_id+item.hour_id+'][day_id]"]').attr('checked', true).change();

								/*$('.hours-list').append(`
									<li>Día: `+item.day+`, Hora: `+item.hour+`</li>
									`);*/
							})
						} else {
							//$('.hours-list').empty();
						}
					}
				},
				error: function(request, status, error) {
					
				}
			});
		}
		$('#modalAssign').on('show.bs.modal', function (event) {
			var btn = $(event.relatedTarget);
			var parent = btn.closest('.card');
			var docente = btn.closest('.docente-item').find('.docente-name').text();
			$('.input_user_id').val(btn.data('user_id'))
			$('.input_course_id').val(btn.data('course_id'))
			$('.input_level_id').val(btn.data('level_id'))
			$('.input_degree_id').val(btn.data('degree_id'))
			$('#modalAssign .docente-name').text(docente);
			$('#modalAssign .degree-name').text(parent.find('.card-title').text());
			$('#modalAssign .course-name').text(btn.parents('.course').find('.course-name').text());

			getList(
				btn.data('user_id'),
				btn.data('course_id'),
				btn.data('level_id'),
				btn.data('degree_id')
			);
		})
		$('#modalAssign').on('hide.bs.modal', function (event) {
			//$('.hours-list').empty();

			$('#modalAssign input[type=checkbox]').attr('checked', false).change();

			var btn = $(event.relatedTarget);
			$('.input_user_id').val('')
			$('.input_course_id').val('')
			$('.input_level_id').val('')
			$('.input_degree_id').val('')
		})
		$('#modalAssign input[type=checkbox]').on('change', function (event) {
			if($(this).is(':checked')) {
				$(this).attr('name', $(this).data('name'));
				items_list = $(this).parent().find('input[type="hidden"]');
				$.each(items_list, function (id, item) {
					$(this).attr('name', $(this).data('name'));
				})
			} else {
				$(this).attr('name', '');
				items_list = $(this).parent().find('input[type="hidden"]');
				$.each(items_list, function (id, item) {
					$(this).attr('name', '');
				})
			}
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
				beforeSend: function() {
					$('.btn-assign-hour').attr('disabled', true);
				},
				success: function(response) {
					$('.btn-assign-hour').attr('disabled', false);
					if (response.success) {
						//console.log(response);
						getList(
							$('.input_user_id').val(),
							$('.input_course_id').val(),
							$('.input_level_id').val(),
							$('.input_degree_id').val(),
						);
					}
				},
				complete: function () {
					//$('.modal.show').modal('hide');
				},
				error: function(request, status, error) {
					$('.btn-assign-hour').attr('disabled', false);
				}
			});
		})
	})
</script>
@endsection