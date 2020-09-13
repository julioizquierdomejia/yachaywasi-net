@extends('layouts.app')

@section('content')

<div class="content">
	<div class="row">
		
		<div class="col-md-8">
			<div class="card card-user">
		      <div class="card-header">
		      	<h5 class="card-title">Registrar Alumno</h5>
		      </div>
		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user/{{$alumno->id}}" enctype="multipart/form-data">
		        	@method('PUT')
					@csrf	
		          <div class="row">
		            <div class="col-md-12 pr-1">
		              <div class="form-group">
		                <label>Nombre del alumno</label>
						<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2" value="{{$alumno->name}}">
		              </div>

		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-4 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="text" name="classroom" placeholder="Aula de su responabilidad" class="form-control mb-2" value="{{$alumno->classroom}}">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>slug</label>
		                <input type="text" name="slug" placeholder="Aula de su responabilidad" class="form-control mb-2" value="{{$alumno->slug}}">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <!--<label>Asociado al colegio de {{ Auth::user()->name }}</label>-->
		                <input type="hidden" name="parent_id" class="form-control mb-2" value="{{ Auth::user()->id }}">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <!--<label>Asociado al rol de  {{ Auth::user()->name }}</label>-->
		                <!-- condicional para crear usuario -->
		                <input type="hidden" name="role_id" class="form-control mb-2" value="lector">
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		                
		              	<div class="custom-file custom-file-browser">
						  <input name='avatar' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>

		              </div>
		            </div>
		          </div>

		          <!-- Inicio CARDS -->
					<!-- Grilla de Niveles / Para asginar Grados -->
					<div class="row row-cols-1 row-cols-md-3">
						@foreach ($niveles as $nivel)
						  <div class="col mb-4">
						    <div class="card">
						      <div class="card-body">
						        <h5 class="card-title">Nivel - {{$nivel->name}}</h5>
						        @foreach ($nivel->degrees as $grado)
						        <div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" name="grades[]" value="{{ $nivel->id }}_{{ $grado->id }}" id="level_{{ $nivel->id}}_grade_{{ $grado->id }}">
								  <label class="custom-control-label" for="level_{{ $nivel->id}}_grade_{{ $grado->id }}">{{$grado->name}}</label>
								</div>
								@endforeach
						      </div>
						    </div>
						  </div>
						 @endforeach
					</div>

					<!-- Fin CARDS -->

		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" style='font-size: 14px;'></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		        @if($courses->count())
                <h5>Cursos</h5>
                <ul>
                  @foreach($courses as $curso)
                  <li>{{$curso->course_name}}</li>
                  @endforeach
              	</ul>
              	@endif
              	Grado: {{$degree}} de {{$level}}
		      </div>
		    </div>
		</div>

	</div>
</div>

@endsection('content')
