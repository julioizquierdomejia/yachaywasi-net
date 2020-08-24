@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		<p>Nivel {{ $course->degree_level->level->name }} - {{ $course->degree_level->degree->name }}</p>
	    <h2 class="display-4">{{ $course->course->name }}</h2>
	    <div class="card card-user">
			<div class="card-header">
				<h5 class="card-title"></h5>
			</div>
		</div>

		<div class="container">
		<div class="row">
			<div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Agregar Temas</h5>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('subject.store') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="level_course_id" value="{{ $course->id }}">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Bimestre</label>
                        <input type="text" class="form-control" name="bimester" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Unidad</label>
                        <input type="text" class="form-control"  name="unit" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Número de Tema</label>
                        <input type="text" class="form-control"  name="position"  placeholder="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Nombre del Tema</label>
                        <input type="text" class="form-control" placeholder=""  name="name" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		              	<div class="custom-file custom-file-browser">
						  <input name='file_drive' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		              	<div class="custom-file custom-file-browser">
						  <input name='file_drive_second' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>
		              </div>
		            </div>
		          </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>URL Video Youtube</label>
                        <input type="text" class="form-control" placeholder="" name="link_youtube" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control" placeholder="" name="date" value="Aqui un date Picker">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Crear Tema</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
		</div>


		<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de Tamas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Bimestre
                      </th>
                      <th>
                        Unidad
                      </th>
                      <th>
                       Numero del Tema
                      </th>
                      <th class="text-right">
                        Nombre del Tema
                      </th>
                    </thead>
                    <tbody>
                      @forelse($subjects as $subject)
                        <tr>
                          <td>{{ $subject->bimester  }}</td>
                          <td>{{ $subject->unit  }}</td>
                          <td>{{ $subject->position  }}</td>
                          <td>{{ $subject->name  }}</td>
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
	</div>



	</div>

	

@endsection