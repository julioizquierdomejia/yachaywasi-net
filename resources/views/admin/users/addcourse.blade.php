@extends('layouts.app')

@section('content')
	

	<div class="content">
		<div class="row">
			<div class="col">
				<h2>Asignar Cursos al Docente</h2>
			</div>
		</div>
		<div class="row">
          <div class="col-md-4">
            <div class="card card-user" style='height: 320px;'>
              <div class="image">
                <img src="{{ assetGCS('images/damir-bosnjak.jpg') }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  	@if( $user->avatar == null)
                  		<img class="avatar border-gray" src="{{assetGCS('images/avatar/guest-user.jpg')}}" alt="...">
                  	@else
                    	<img class="avatar border-gray" src="{{assetGCS('images/avatar/'.$user->avatar) }}" alt="...">
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
            </div>
          </div> 

          <!-- Columna del formulario -->
          <div class="col-md-8">
            <div class="card card-user">
		      <div class="card-header">
		      	<h5 class="card-title">Asignar cursos</h5>
		      </div>
				<!-- Inicio del card_body -->
				<div class="card-body">
					
					<form class="form-group" method="POST" action="/createcourses" enctype="multipart/form-data">
					@csrf
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="user_id" placeholder="Id del Usuario" class="form-control mb-2" value="{{$user->id}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="level_id" placeholder="Nivel" class="form-control mb-2" id="level_id">
								</div>
							</div>
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="degree_id" placeholder="Grado" class="form-control mb-2" id="degree_id">
								</div>
							</div>
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="course_id" placeholder="Curso" class="form-control mb-2" id="course_id">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown_nivel">
									    Seleccion Un Nivel
									  </button>
									  <div class="dropdown-menu shadow" id="dropdown_niveles">
									  	@foreach($niveles_list as $nivel)
									    <a class="dropdown-item opc_nivel" href="#" id="{{$nivel->id}}">{{$nivel->name}}</a>
									    @endforeach
									  </div>
									</div>
								</div>
							</div>

							<div class="col-md-4 pr-1">
								
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Seleccion Un Grado
									  </button>
									  <div class="dropdown-menu shadow opc-grados">
									  	@foreach($grados_list as $grado)
									    <a class="dropdown-item opc_grado" href="#" id="{{$grado->id}}">{{$grado->name}}</a>
									    @endforeach
									  </div>
									</div>
								
							</div>

							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Seleccion Un Curso
									  </button>
									  <div class="dropdown-menu shadow opc-cursos">
										@foreach($cursos_list as $curso)
									    <a class="dropdown-item opc_curso" href="#" id="{{$curso->id}}">{{$curso->name}}</a>
									    @endforeach
									  </div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="submit" class="btn btn-primary"><i class="far fa-edit mr-2" style='font-size: 14px;'></i> Agregar Curso para el usuario --  {{$user->id}}</button>
							</div>
						</div>
					</form>
				</div>
				<!-- Fin del card_body -->
		    </div>

          </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					@foreach($niveles as $nivel)
						<p>{{$nivel->name}}</p>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					@foreach($grados as $grado)
						<p>{{$grado->name}}</p>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					@foreach($cursos as $curso)
						<p>{{$curso->name}}</p>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					{{$usuario}}
				</div>
			</div>
		</div>


	</div>

@endsection


@section('script')
	
	<script>
		$(document).ready(function(){
			$('.dropdown-item').click(function(){

				if( $(this).hasClass('opc_nivel') ){
					$('#level_id').val($(this).attr('id'));
				}

				if( $(this).hasClass('opc_grado') ){
					$('#degree_id').val($(this).attr('id'));
				}

				if( $(this).hasClass('opc_curso') ){
					$('#course_id').val($(this).attr('id'));
				}

				nivel = $(this).parent();
				nivel.parent().find($('.dropdown-toggle')).text($(this).text())
				currentId = $(this).attr('id');
				//AJAX

				/*
				$.get( "/api/grados/"+currentId, function( data ) {
				  var html_select;
				  for (var i = 0; i < data.length; i++) {
				  	html_select += '<label class="btn btn-secondary"><input type="radio" name="options" id="option1"> ' + data[i].name + '</label>'
				  	$('.opc-grados').html(html_select);
				  }
				});
				*/

			})
		})

		

	</script>

@endsection

