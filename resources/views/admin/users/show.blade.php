@extends('layouts.app')

@section('content')

	<div class="content">
		<div class="row">
			<div class="col">
				<h2>Información del Docente</h2>
			</div>
		</div>
		<div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../images/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  	@if( $user->avatar == null)
                  		<img class="avatar border-gray" src="{{ asset('images/avatar/guest-user.jpg') }}" alt="...">
                  	@else
                    	<img class="avatar border-gray" src="{{ assetGCS('images/avatar/'. $user->avatar) }}" alt="...">
                    @endif
                    <h5 class="title">Miss {{ $user->name }}</h5>
                  </a>
                  <p class="description">
                    <b><i class="fas fa-phone-alt mr-2"></i> {{ $user->phone }}</b>
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
                      <h5>19<br><small>Alumnos</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>{{$levelDegrees->count()}}<br><small>Grados</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>{{$cursos->count()}}<br><small>Cursos</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="col-md-8">
            <div class="card card-user">
		      <div class="card-header">
		      	@if ( Auth::user()->roles->first()->name == 'admin')
					<h5 class="card-title">Actualizar Datos del docente</h5>
				@endif

				@if ( Auth::user()->roles->first()->name == 'editor')
					<h5 class="card-title">Registrar Alumno</h5>
				@endif
				
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user/{{$user->id}}" enctype="multipart/form-data">
		        	@method('PUT')
					@csrf
		          <div class="row">
		            <div class="col-md-2 pr-1">
		              <div class="form-group">
		                <label>Titulo</label>
		                <select name="title"class="form-control mb-2">
											<option value="Miss" {{$user->title == 'Miss' ? 'selected' : ''}}>Miss</option>
											<option value="Prof." {{$user->title == 'Prof.' ? 'selected' : ''}}>Prof.</option>
										</select>
		              </div>
		            </div>
		            <div class="col-md-5 pr-1">
		              <div class="form-group">
		                <label>Nombre del Docente</label>
						<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2"value='{{$user->name}}'>
		              </div>
		            </div>
		            <div class="col-md-5 pl-1">
		              <div class="form-group">
		                <label>Telefono</label>
		                <input type="text" name="phone" placeholder="Telefono Celular" class="form-control mb-2" value="{{$user->phone}}">
		              </div>
		            </div>
		            
		          </div>
		          <div class="row">
		          	<div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="classroom" name="classroom" placeholder="Aula a cargo" class="form-control mb-2"value='{{$user->classroom}}'>
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
		          </div>

		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		                
		              	<div class="custom-file custom-file-browser">
						  <input name='avatar' type="file" class="custom-file-input form-control" id="customFileLang" lang="es" value="hola">
						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>

		              </div>
		            </div>
		          </div>


		          <!-- Inicio CARDS -->
					<!-- Grilla de Niveles / Para asginar Grados -->
					<div class="row row-cols-1 row-cols-md-3">
						@foreach($levelDegrees as $levelDegree)
							<div class="col mb-4">
								<div class="card">
									<div class="card-body">
									<h5 class="card-title">Nivel {{ $levelDegree->level->name }} - {{ $levelDegree->degree->name }}</h5>
									@foreach ($cursos as $curso)
									    <div class="custom-control custom-checkbox">
										  	<input type="checkbox" class="custom-control-input" name="courses[]" value="{{ $levelDegree->id }}_{{ $curso->id }}" id="{{ $levelDegree->id }}_course_{{ $curso->id }}" {{ $curso->verifyCourseInLevelDegree($user->id,$levelDegree->level_id,$levelDegree->degree_id) ? 'checked' :'' }}>
										  	<label class="custom-control-label" for="{{ $levelDegree->id }}_course_{{ $curso->id }}">{{$curso->name}}</label>
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
		              <button type="submit" class="btn btn-primary"><i class="far fa-edit mr-2" style='font-size: 14px;'></i> Actualizar Datos del docente</button>
						<!--a class='btn btn-primary' href="{{ url('/createcourses/'.$user->id) }}"> <i class="far fa-edit mr-2" style='font-size: 14px;'></i> Agregar Cursos - {{$user->id}}</a-->
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
          </div>
        </div>
		

		
	</div>

@endsection('content')