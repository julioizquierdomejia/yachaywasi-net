@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="col-md-12">
		    <div class="card card-user">
		      <div class="card-header">
				<h5 class="card-title">Crear Curso</h5>
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/course/{{$curso->id}}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
		          <div class="row">
		            <div class="col-md-8 pr-1">
		              <div class="form-group">
		                <label>nombre de Área</label>
							<input type="text" name="name" placeholder="Nombre del Curso" class="form-control mb-2" value="{{$curso->name}}">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>Abreviatura</label>
		                <input type="text" name="abreviatura" placeholder="Ingresa abreviatura" class="form-control mb-2" value="{{$curso->abreviatura}}">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-12">
		              <div class="form-group">
		                <label >Descripción</label>
		                <input type="text" name="descripcion" placeholder="" class="form-control mb-2" rows="3" value="{{$curso->descripcion}}">
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		              	<div class="custom-file custom-file-browser">
		              		<input name='images' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
		              		<label name='images' class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>
		              </div>
		            </div>
		          </div>

		          <div class="row">
		          	<div class="col-12 col-md-4">
		          		@if($curso->images == null)
							<img class="card-img-top" src="../../images/course-default.png" alt="Card image cap">
						@else
							<img class="card-img-top" src="../../images/course/{{$curso->images}}" alt="Card image cap">
						@endif
		          	</div>
		          </div>
		          
		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              
		              <a href="{{ route('course.index') }}" class="btn btn-success" style="font-size: 14px;"><i class="fas fa-arrow-circle-left mr-2" style="font-size: 18px;"></i> Voler a ver cursos</a>

		              <button type="submit" class="btn btn-primary" style="font-size: 14px;"><i class="far fa-save mr-2" style="font-size: 18px;"></i> Actualizar Curso</button>

		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

	@if ($errors->any())
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				<span><i class="fas fa-exclamation-triangle"></i> {{ $error }}</span>
			</div>
		@endforeach
	@endif
	</div>


@endsection('content')