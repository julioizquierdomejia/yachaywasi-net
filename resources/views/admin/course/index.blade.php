@extends('layouts.app')

@section('content')
	
	<a href="{{ route('course.create') }}" class="btn btn-primary btn-round">Crear Cursos</a>

	<h1 class="display-4">Cursos</h1>
	
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
			@forelse ($cursos as $curso)
				<div class="col mb-4">
					<div class="card" style='height: 500px;'>
						@if($curso->images == null)
							<img class="card-img-top" src="images/course-default.png" alt="Card image cap">
						@else
							<img class="card-img-top" src="images/course/{{$curso->images}}" alt="Card image cap">
						@endif
					  <div class="card-body">
					    <h5 class="card-title">{{ $curso->name }}</h5>
					    <p class="card-text"> {{ $curso->descripcion }}</p>
					    
					  </div>

					  <div class="card-footer mt">

						<a href=" {{ route('course.show', $curso->id ) }}" class="btn btn-primary button-tooltip" data-toggle="tooltip" title="Crear competencias"><i class="fas fa-search"></i></a>
						<a href="{{route('course.edit', $curso->id )}}" class="btn btn-success button-tooltip" data-toggle="tooltip" title="Editar Curso"><i class="far fa-edit"></i></a>

						<!--form class="form-group d-inline" method="POST" action="/course/{{$curso->id}}" id="form_delete_coutse">
							@csrf
							@method('DELETE')
							<button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#modalDeleteCourse">
                            <i class="far fa-trash-alt"></i>
                          </button>

						</form-->

						</div>


					</div>
				</div>
			@empty
			<div class="col mb-4 text-muted">
				No se agregaron cursos.
			</div>
			@endforelse
		</div>

		<!-- Modal confirmacion de eliminacion de Registro-->
	    <div class="modal fade" id="modalDeleteCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Curso</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            ¿Está seguro de Eliminar el Curso de <b></b>? <br>
	            al elimiar este curso, también se eliminaran sus <b>Competencias</b>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">
	              <i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
	            </button>
	            <button type="button" class="btn btn-danger btn-delete-course">
	              <i class="far fa-trash-alt mr-2" style='font-size: 14px;'></i>Eliminar
	            </button>
	          </div>
	        </div>
	      </div>
	    </div>

@endsection

<!--
	@foreach ($cursos as $curso)
		<div class="mb-4">

			<h2 class="">{{ $curso->name }}</h2>

		@foreach ($curso->competencie as $competencia)
			<p>{{ $competencia->name }}</p>
		@endforeach

		</div>
	@endforeach
	-->
