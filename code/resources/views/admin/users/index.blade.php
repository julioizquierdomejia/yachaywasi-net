@extends('layouts.app')

@section('content')

@if ($errors->any())
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">
					<span><i class="fas fa-exclamation-triangle"></i> {{ $error }}</span>
				</div>
			@endforeach
		@endif

<div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../images/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  	@if( $userAuth->avatar == null)
                  		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="...">
                  	@else
                    	<img class="avatar border-gray" src="images/avatar/{{ $userAuth->name }}" alt="...">
                    @endif
                    <h5 class="title">Colegio - {{ $userAuth->school }}</h5>
                  </a>
                  <p class="description">
                    {{ $userAuth->name }}
                  </p>
                </div>
                <p class="description text-center">
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>{{$docentes->count()}}<br><small>Docentes</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>{{$cursos->count()}}<br><small>Cursos</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Equipo de Docentes</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                	@foreach ($docentes as $docente)
	                  <li>
	                    <div class="row">
	                      <div class="col-md-2 col-2">
	                        <div class="avatar">
	                        	@if($docente->avatar == null)
	                        		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="">
	                        	@else
	                        		<img src="images/avatar/{{ $docente->avatar }}" class="img-circle img-no-padding img-responsive">
	                        	@endif

	                          
	                        </div>
	                      </div>
	                      <div class="col-md-7 col-7">
	                        {{ $docente->name }}
	                        <br />
	                        <span class="text-muted"><small>{{ $docente->classroom }}</small></span>
	                      </div>
	                      <div class="col-md-3 col-3 text-right">
	                      	<a href="{{ route('user.show', $docente->id ) }}" class="btn btn-sm btn-outline-info btn-round btn-icon">
	                      		<i class="far fa-edit"></i>
	                      	</a>
	                        <form class="form-group d-inline" method="POST" action="/user/{{$docente->id}}" id="form-delete-user">
						      	@csrf
								@method('DELETE')
								<button type="button" class="btn btn-sm btn-outline-danger btn-round btn-icon" data-toggle="modal" data-target="#exampleModalCenter">
									<i class="far fa-trash-alt"></i>
								</button>
						    </form>
	                        
	                      </div>
	                    </div>
	                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
		      <div class="card-header">
		      	@if ( Auth::user()->roles->first()->name == 'admin')
					<h5 class="card-title">Registrar Docente</h5>
				@endif

				@if ( Auth::user()->roles->first()->name == 'editor')
					<h5 class="card-title">Registrar Alumno</h5>
				@endif
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
		                @if ( Auth::user()->roles->first()->name == 'admin')
							<input type="hidden" name="role_id" class="form-control mb-2" value="editor">
						@endif

						@if ( Auth::user()->roles->first()->name == 'editor')
							<input type="hidden" name="role_id" class="form-control mb-2" value="lector">
						@endif
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
        </div>
      </div>

      <!-- Modal confirmacion de eliminacion de Registro-->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Docente</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ¿Está seguro de Eliminar el registro?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">
		        	<i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
		        </button>
		        <button type="button" class="btn btn-danger btn-delete-user">
		        	<i class="far fa-trash-alt mr-2" style='font-size: 14px;'></i>Eliminar
		        </button>
		      </div>
		    </div>
		  </div>
		</div>

<!-- 
<div class="container mt-5">

	@if(session('status'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif

	<h1 class="display-4">Docentes</h1>

	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
	  	@foreach ($docentes as $item)
	  	<div class="col mb-4">
		  	<div class="card text-center">
			    <img src="images/avatar/{{ $item->avatar }}" class="card-img-top rounded-circle mx-auto d-block mt-5 mb-2" alt="{{ $item->name }}" style="height: 100px; width: 100px;">
			    <div class="card-body">
			      <h2 class="card-title">{{ $item->name }}</h2>
			      <a href="{{ route('user.show', $item->id ) }}" class="btn btn-primary"><i class="fas fa-search"></i> Ver mas</a>
			      <a href="{{ route('user.edit', $item->id ) }}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a>
			      
			      <form class="form-group" method="POST" action="/user/{{$item->id}}">
			      	@csrf
					@method('DELETE')
			      	<button type="submit" class="btn btn-danger d-inline"><i class="far fa-trash-alt"></i> Eliminar</button>
			      </form>

			    </div>
			    <div class="card-footer mt">
			      <small class="text-muted">Colegio Vygotsky - Docente</small>
			    </div>
			  </div>
		  </div>
	    @endforeach
	</div>


	<a href="{{ route('user.create') }}" class="btn btn-primary">Agregra Usuario</a>
</div>
-->


@endsection('content')
