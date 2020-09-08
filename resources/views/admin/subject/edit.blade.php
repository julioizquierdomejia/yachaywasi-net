@extends('layouts.app')

@section('content')
	<div class="col-12">

      <a href="">Volver a la lista de temas </a>

	    <h2 class="display-4">{{$tema->name}}</h2>

		<div class="content">
		<div class="row">
			<div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Agregar Temas</h5>
              </div>
              <div class="card-body">
                <form class="form-group" method="post" action="/subject/{{$tema->id}}" enctype="multipart/form-data">
                <!--form method="POST" action="{{ route('subject.update',$tema->id) }}"-->

                  @method('PUT')
                  @csrf
                  <!--input type="hidden" name="level_course_id" value="{{ $tema->id }}"-->
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nombre del Tema</label>
                        <input type="text" class="form-control" placeholder=""  name="name" value=" {{$tema->name}} ">
                      </div>
                    </div>

                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Bimestre</label>
                        <input type="text" class="form-control" name="bimester" placeholder="" value=" {{$tema->bimester}} ">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Unidad</label>
                        <input type="text" class="form-control"  name="unit" placeholder="" value=" {{$tema->unit}} ">
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Número de Tema</label>
                        <input type="text" class="form-control"  name="position"  placeholder="" value=" {{$tema->position}} ">
                      </div>
                    </div>
                  </div>
                  
                  <!--div class="row">
    		            <div class="col-md-6">
    		              <div class="form-group">
    		              	<div class="custom-file custom-file-browser">
            						  <input name='file_drive' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
            						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
            						</div>
    		              </div>
    		            </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <div class="custom-file custom-file-browser">
                        <input name='file_drive_second' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
                        <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
                      </div>
                    </div>
                  </div>
		            </div-->
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>URL Video Youtube</label>
                        <input type="text" class="form-control" placeholder="" name="link_youtube" value=" {{$tema->link_youtube}} ">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Fecha : </label>{{$tema->date->format('d/m/Y')}}
                        <input type="date" class="form-control" placeholder="" name="date" value=" " required>
                        <input type="hidden" name="user_id" class="form-control mb-2" value="{{ Auth::user()->parent_id }}">
                        <input type="hidden" name="level_course_id" class="form-control mb-2" value="{{$tema->id}}">
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Actualizar Tema</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
		</div>

	</div>



	</div>

	

@endsection