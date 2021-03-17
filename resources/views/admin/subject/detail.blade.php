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
<h2 style='font-size: 22px;'><b>Bimestre </b>{{$tema->bimester}} / <b>Unidad</b> {{$tema->unit}} </h2>
<h1 style='font-size: 38px;'><b>Tema: {{$tema->position}} </b> / {{$tema->name}}</h1>
<h5 style='font-size: 16px; margin-top: -20px; padding-top: 0;'>Fecha: {{$diaDeSemana}}, {{$dia}} de {{$mes}} del {{$anio}}
<span class="buttons">
	<button class="btn btn-light btnAddComment" data-docenteid="{{$tema->user_id}}" data-temaid="{{$tema->id}}" type="button"><i class="fa fa-comments"></i></button>
</span></h5>
<div class="content">
	<div class="row">
		<div class="col-md-6">
			@if($videoKey != null)
			<div class="card card-user">
				<div class="card-body">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$videoKey}}" allowfullscreen></iframe>
					</div>
				</div>
				<div class="card-footer">
					<hr>
					<div class="button-container">
						<div class="row">
							<div class="col-lg-3 col-md-6 col-6 ml-auto">
								<h5>Bimestre<br><small>{{$tema->bimester}}</small></h5>
							</div>
							<div class="col-lg-3 col-md-6 col-6 ml-auto mr-auto">
								<h5>Unidad<br><small>{{$tema->unit}}</small></h5>
							</div>
							<div class="col-lg-3 mr-auto">
								<h5>Tema<br><small>{{$tema->position}}</small></h5>
							</div>
							<div class="col-lg-3 mr-auto subject-works text-center">
								<button class="btn btn-primary px-1 py-2" data-href="{{ route('subject-works.show', $tema->id) }}">{{$user_role->name == 'lector' ? 'Adjuntar tarea' : 'Ver tareas'}}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			@if ( $tema->homework != null || $tema->urldrive != null || $tema->urlpdf != null)
			
			<!-- skjdfhsjdfhshdfhdjfg -->
			<h5 class="mt-3">Material de Apoyo</h5>
			<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
				@if($tema->homework != null)
				<div class="col mb-4">
					<div class="card">
						<!-- card Body -->
						<div class="card-body text-center mt-3">
							<a href="{{ $tema->homework }}" type="button" class="">
								<img src="{{ asset('images/icon-google-forms.png') }}" width="64px;">
							</a>
						</div>
						<!-- end card Body -->
						<!-- card Footer -->
						<div class="card-footer ">
							<hr>
							<div class="stats text-primary">
								<i class="fas fa-book-reader text-danger"></i>
								Vence el - {{$tema->fecha_vencimiento->format('d-m-Y')}}
							</div>
						</div>
						<!-- end card Footer -->
					</div>
				</div>
				@endif
				@if($tema->urldrive != null)
				<div class="col mb-4">
					<div class="card">
						<!-- card Body -->
						<div class="card-body text-center mt-3">
							<a href="{{ $tema->urldrive }}" type="button" class="">
								<img src="{{ asset('images/logo_drive.png') }}" width="64px;">
							</a>
						</div>
						<!-- end card Body -->
						<!-- card Footer -->
						<div class="card-footer ">
							<hr>
							<div class="stats text-primary">
								<i class="fas fa-book-reader text-danger"></i>
								Ver archivo
							</div>
						</div>
						<!-- end card Footer -->
					</div>
				</div>
				@endif
				@if($tema->urlpdf != null)
				<div class="col mb-4">
					<div class="card">
						<!-- card Body -->
						<div class="card-body text-center mt-3">
							<a href="{{ $tema->urlpdf }}" type="button" class="">
								<img src="{{ asset('images/logo_pdf.png') }}" width="64px;">
							</a>
						</div>
						<!-- end card Body -->
						<!-- card Footer -->
						<div class="card-footer ">
							<hr>
							<div class="stats text-primary">
								<i class="fas fa-book-reader text-danger"></i>
								Desacrgar PDF
							</div>
						</div>
						<!-- end card Footer -->
					</div>
				</div>
				@endif
				@if($tema->zoom != null)
				<div class="col mb-4">
					<div class="card">
						<!-- card Body -->
						<div class="card-body text-center mt-3">
							<a href="{{ $tema->zoom }}" type="button" class="">
								<img src="{{ asset('images/logo_zoom.png') }}" width="64px;">
							</a>
						</div>
						<!-- end card Body -->
						<!-- card Footer -->
						<div class="card-footer ">
							<hr>
							<div class="stats text-primary">
								<i class="fas fa-book-reader text-danger"></i>
								Ingresar el : {{$tema->date->format('d-m-Y')}}
							</div>
						</div>
						<!-- end card Footer -->
					</div>
				</div>
				@endif
			</div>
			@else
			@endif
			<!--div class="card">
			<div class="card-header">
				<h4 class="card-title">Mensajes</h4>
			</div>
			<div class="card-body">
				<form>
					<div class="form-group">
								<label for="exampleFormControlTextarea1">Dejame un Mensaje</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							</div>
							<div class="row">
						<div class="update ml-auto mr-auto">
							<button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i> Enviar </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div-->
	<div class="col-md-6 d-none">
		<div class="card card-user">
			<div class="card-header">
				<h5 class="card-title">Enviar Evidencias</h5>
			</div>
			<div class="card-body">
				aqui el formulario
			</div>
		</div>
	</div>
</div>
@if ($user_role->name == 'editor')
<div class="col-12">
	<h5 class="h6">Alumnos que vieron el tema</h5>
	<table class="table">
		<thead>
			<tr>
				<th>Alumno</th>
				<th>Asistencia</th>
				<th>Fecha vista</th>
				<th>Veces visto</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tema->views as $item)
			<tr>
				<td class="mb-0">{{$item->user->name}}</td>
				<td>{!!
					($tema->fecha_vencimiento && $tema->fecha_vencimiento->format('Y-m-d') <= $item->created_at->format('Y-m-d')) == 'P' ? '<span class="badge badge-success px-3">A tiempo</span>' : '<span class="badge badge-danger px-3">Faltó</span>' !!}</td>
				<td>{{$item->created_at->format('d-m-Y h:i:s a')}}</td>
				<td>{{$item->views}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>
</div>
<hr>
<div class="works-section">
	<h5>Trabajos</h5>
	<div class="row">
	@if ($user_role->name == 'lector')
		<form class="form-group col-12 col-md-6 col-lg-5" method="POST" action="/subject-works" enctype="multipart/form-data">
			@csrf
			@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		            <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif
			<input type="hidden" name="subject_id" value="{{$tema->id}}">
			<div class="form-group">
				<label for="lbltitle">Título</label>
				<input class="form-control" type="text" name="title" id="lbltitle">
			</div>
			<div class="form-group">
				<label for="lblDescription">Descripción</label>
				<textarea name="description" class="form-control" id="lblDescription" rows="3"></textarea>
			</div>
			<div class="form-group">
				<div class="custom-file custom-file-browser">
					<input name="file" type="file" class="custom-file-input form-control" id="customFile" lang="es">
					<label class="custom-file-label label-file" for="customFile">Seleccionar Archivo</label>
				</div>
			</div>
			<div class="row">
				<div class="update ml-auto mr-auto">
					<button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i> Enviar </button>
				</div>
			</div>
		</form>
	@endif
	@if ($user_role->name == 'lector')
		<div class="suject-works col-12 col-md-6 col-lg-7">
			<div class="table-responsive">
			<table class="table display list-unstyled team-members" id="table_students">
				<thead class=" text-primary">
					<th>Imagen</th>
					<th>Título</th>
					<th>Descripción</th>
				</thead>
				<tbody>
					@forelse($works as $work)
					@php
						$file = $work->file ? '/images/subject-works/'. $work->file : '/images/avatar/guest-user.jpg';
					@endphp
					<tr>
						<td><b>
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSubjectWork" data-src="{{$file}}"><i class="fa fa-eye"></i></button>
						</b></td>
						<td>{{ $work->title }}</td>
						<td>{!! $work->description !!}</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" class="text-center">No existen datos</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			</div>
		</div>
	@else
		<div class="suject-works col-12">
			<div class="table-responsive">
			<table class="table display list-unstyled team-members" id="table_students">
				<thead class=" text-primary">
					<th>Imagen</th>
					<th>Usuario</th>
					<th>Título</th>
					<th>Descripción</th>
				</thead>
				<tbody>
					@php
						$colors = array('primary', 'secondary', 'danger', 'warning', 'dark', 'info', 'success', 'light');
						$x = 0;
						$colors_count = count($colors);
					@endphp
					@forelse($works as $work_index => $work)
					@php
						$file = $work->file ? '/images/subject-works/'. $work->file : '/images/avatar/guest-user.jpg';
						$is_different = $work_index > 0 && $work->user->name == $works[$work_index - 1]->user->name;
						if(!$is_different) 
							$x++;
						if(!isset($colors[$x])){
							$x = 0; //if color will less then records it will start from 0 again
						}
					@endphp
					<tr>
						<td>
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSubjectWork" data-src="{{$file}}"><i class="fa fa-eye"></i></button>
						</td>
						<td>{!! $is_different ? ('<span class="badge badge-'.$colors[$x].' px-3 py-2">'.$work->user->name.'</span>') : '<span class="badge badge-'.$colors[$x].' px-3 py-2">'.$work->user->name.'</span>' !!}</td>
						<td>{{ $work->title }}</td>
						<td>{!! $work->description !!}</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" class="text-center">No existen datos</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			</div>
		</div>
	@endif
	</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" id="modalSubjectWork">
    <div class="modal-dialog modal-lg" style="max-height: calc(100vh - 40px)">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body h-100 text-center">
            <img class="image img-fluid" src="" width="600" style="width: auto;">
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@include('admin.subject.comments')
<script type="text/javascript">
	$('#modalSubjectWork').on('show.bs.modal', function (event) {
    		$('#modalSubjectWork .modal-body .image').attr('src', $(event.relatedTarget).data('src'))
    	})
</script>
@endsection