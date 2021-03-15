@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Tareas para {{$current_subject->name}}</h4>
	</div>
	<div class="card-body">
	@if ($user_role->name == 'lector')
		@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
		<form class="form-group" method="POST" action="/subject-works" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="subject_id" value="{{$subject}}">
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
		<div class="suject-works">
			<table class="table display list-unstyled team-members" id="table_students">
				<thead class=" text-primary">
					<th>Imagen</th>
					<th>Título</th>
					<th>Descripción</th>
				</thead>
				<tbody>
					@forelse($works as $work)
					@php
						$file = '';
					@endphp
					@if($work->file == null)
						@php
							$file = '/images/avatar/guest-user.jpg';
						@endphp
						@else
						@php
							$file = '/images/subject-works/'. $work->file;
						@endphp
						@endif
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
	@else
		<div class="suject-works">
			<table class="table display list-unstyled team-members" id="table_students">
				<thead class=" text-primary">
					<th>Imagen</th>
					<th>Usuario</th>
					<th>Título</th>
					<th>Descripción</th>
				</thead>
				<tbody>
					@forelse($works as $work)
					@php
						$file = '';
					@endphp
					@if($work->file == null)
						@php
							$file = '/images/avatar/guest-user.jpg';
						@endphp
						@else
						@php
							$file = '/images/subject-works/'. $work->file;
						@endphp
						@endif
					<tr>
						<td>
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSubjectWork" data-src="{{$file}}"><i class="fa fa-eye"></i></button>
						</td>
						<td>{{ $work->user->name }}</td>
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
	@endif
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
<script>
	$(document).ready(function (event) {
		$('#modalSubjectWork').on('show.bs.modal', function (event) {
    		$('#modalSubjectWork .modal-body .image').attr('src', $(event.relatedTarget).data('src'))
    	})
	})
</script>
@endsection