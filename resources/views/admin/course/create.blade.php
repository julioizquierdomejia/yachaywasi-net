@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endsection('head')

@section('content')

	<div class="container">
		
		<div class="col-md-12">
		    <div class="card card-user">
		      <div class="card-header">
				<h5 class="card-title">Crear Curso</h5>
		      </div>

		      <div class="card-body">
		        <form class="form-group dropzone" method="POST" action="/course" enctype="multipart/form-data" id="my-awesome-dropzone">
					@csrf
		          <div class="row">
		            <div class="col-md-8 pr-1">
		              <div class="form-group">
		                <label>nombre de Área</label>
							<input type="text" name="name" placeholder="Nombre del Curso" class="form-control mb-2" value="{{ old('name') }}">
							@error('name')
			                    <span class="invalid-feedback d-block" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>Abreviatura</label>
		                <input type="text" name="abreviatura" placeholder="Ingresa abreviatura" class="form-control mb-2" value="{{ old('abreviatura') }}" >
		                @error('abreviatura')
		                    <span class="invalid-feedback d-block" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-12">
		              <div class="form-group">
		                <label >Descripción</label>
		                <input type="text" name="descripcion" placeholder="" class="form-control mb-2" rows="3" value="{{ old('descripcion') }}">
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
						@error('images')
		                    <span class="invalid-feedback d-block" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
		              </div>
		            </div>
		          </div>

		          <div class="row mt-3">
		          	<div class="col">
		          		<div class="form-group">
			          		<label for="favcolor">Elija un color para su Curso</label>
	  						<input type="color" id="favcolor" name="bg_color" value="{{ old('bg_color') }}"><br><br>
	  					</div>
		          	</div>
		          </div>

		          <div class="row">
		          	<div class="col">
		          		<div class="form-group">
			          		<label for="favcolor">Elija un color de texto</label>
	  						<input type="color" id="favcolor" name="color" value="{{ old('color') }}"><br><br>
	  					</div>
		          	</div>
		          </div>
		          
		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              
		              <a href="{{ route('course.index') }}" class="btn btn-success" style="font-size: 14px;"><i class="fas fa-arrow-circle-left mr-2" style="font-size: 18px;"></i> Voler a ver cursos</a>

		              <button type="submit" class="btn btn-primary" style="font-size: 14px;"><i class="far fa-save mr-2" style="font-size: 18px;"></i> Crear Área</button>

		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>


@endsection('content')

@section('javascript')

	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.js'></script>



@endsection('javascript')