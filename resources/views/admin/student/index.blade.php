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
		        <form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
					@csrf
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Nombre del Docente</label>
						<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
		              </div>

		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Username</label>
		                <input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-4 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		                <input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="text" name="classroom" placeholder="Aula de su responabilidad" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>slug</label>
		                <input type="text" name="slug" placeholder="Aula de su responabilidad" class="form-control mb-2">
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
		      </div>
		    </div>
		</div>



		<div class="col-md-4">
			<div class="card">
              <div class="card-header">
                <h4 class="card-title">Listado general de Alumnos</h4>
              </div>
              <div class="card-body">
              	<div class="list-unstyled team-members">
              		<table class="table display list-unstyled team-members" id="table_studens">
	              		<thead class=" text-primary">
	                      <th>
	                        Imagen
	                      </th>
	                      <th>
	                        Nombre
	                      </th>
	                      <th>
	                        Tool
	                      </th>
	                    </thead>
	                    <tbody>
	                      
	                      @forelse($alumnos as $alumno)
	                        <tr>
	                          <td><b>
		                          	@if($alumno->avatar == null)
		                        		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="">
		                        	@else
		                        		<img src="images/avatar/{{ $alumno->avatar }}" class="img-circle img-no-padding img-responsive">
		                        	@endif
	                          </b></td>
	                          <td>
	                          	{{ $alumno->name }}
	                          	<br />
		                        <span class="text-muted"><small>{{ $alumno->classroom }}</small></span>
	                          </td>
	                          <td><a href="{{ route('student.show', $alumno->id ) }}" class="btn btn-sm btn-outline-info btn-round btn-icon">
		                      		<i class="far fa-edit"></i></td>
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
            </div>
		</div>
	</div>
</div>

@endsection
