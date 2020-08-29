@extends('layouts.app')

@section('content')

	<div class="col-md-8">
    <h2 class="display-4">{{ $course->name }}</h2>
            <div class="card card-user">
		      <div class="card-header">
		      	<h5 class="card-title">Agregar Competencia</h5>
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/competencie" enctype="multipart/form-data">
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
		                <label>Descripcion</label>
		                <input type="text" name="descripcion" placeholder="descripcion" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <!--<label>Asociado al colegio de {{ Auth::user()->name }}</label>-->
		                <input type="hidden" name="course_id" class="form-control mb-2" value="{{ $course->id }}">
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary btn-round"><i class="far fa-save mr-2" style='font-size: 14px;'></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
          </div>

	<h2 class="display-5">Competencias</h2>
	<!-- competencias -->
	<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Competencia
                    </th>
                    <th>
                      Descripción
                    </th>
                    <th class="text-right">
                      Tools
                    </th>
                  </thead>
                  <tbody>
                    @foreach($competencias as $competencia)
                    <tr>
                      <td>
                        {{ $competencia->name }}
                      </td>
                      <td>
                        {{ $competencia->descripcion }}
                      </td>
                      <td class="text-right">

                        <a href="{{ route('competencie.edit', $competencia->id ) }}" class="btn btn-success"><i class="far fa-edit"></i></a>

                        <form class="form-group d-inline" method="POST" action="/course/{{$competencia->id}}">
                          @csrf
                          @method('DELETE')
                          <!--
                          <button type="submit" class="btn btn-danger d-inline"><i class="far fa-trash-alt"></i></button>
                          -->

                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteCompetencie">
                            <i class="far fa-trash-alt"></i>
                          </button>

                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal confirmacion de eliminacion de Registro-->
    <div class="modal fade" id="modalDeleteCompetencie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Competencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Está seguro de Eliminar Competencia?
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

@endsection