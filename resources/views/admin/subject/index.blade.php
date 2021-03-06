@extends('layouts.app')

@section('content')

	<div class="col-12">
    <a href="/dashboard" class="btn btn-primary">
      <i class="fas fa-arrow-circle-left" style='font-size: 18px; margin-right: 5px; margin-top: 2px;'></i>
        Volver a cursos
    </a>
		<p>Nivel {{ $course->degree_level->level->name }} - {{ $course->degree_level->degree->name }}</p>
	    <h2 class="display-4">{{ $course->course->name }}</h2>

		<div class="content">
    
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
                    <div class="col-md-6 pr-sm-1">
                      <div class="form-group">
                        <label>Nombre del Tema <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" placeholder=""  name="name" value="" required>
                      </div>
                    </div>

                    <div class="col-md-2 pr-sm-1">
                      <div class="form-group">
                        <label>Bimestre <span class="text-danger">(*) (Ejem. 1, 2, 3)</span></label>
                        <input type="text" class="form-control" name="bimester" placeholder="" value="" required>
                      </div>
                    </div>
                    <div class="col-md-2 px-sm-1">
                      <div class="form-group">
                        <label>Unidad <span class="text-danger">(*) (Ejem. 1, 2, 3)</span></label>
                        <input type="text" class="form-control"  name="unit" placeholder="" value="" required>
                      </div>
                    </div>
                    <div class="col-md-2 pl-sm-1">
                      <div class="form-group">
                        <label>Número de Tema <span class="text-danger">(*) (Ejem. 1, 2, 3)</span></label>
                        <input type="text" class="form-control"  name="position"  placeholder="" value="" required>
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
                        <input type="text" class="form-control" placeholder="" name="link_youtube" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Fecha del Tema <span class="text-danger">(*)</span></label>
                        <input type="date" class="form-control" placeholder="" name="date" value="Aqui un date Picker" required>
                        <input type="hidden" name="user_id" class="form-control mb-2" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="school_id" class="form-control mb-2" value="{{ Auth::user()->parent_id }}">
                      </div>
                    </div>
                  </div>

                  <h5 class="card-title">Material Adicional Opcional</h5>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Link ZOOM</label>
                        <input type="text" class="form-control" placeholder="" name="zoom" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>URL - Documento PDF</label>
                        <input type="text" class="form-control" placeholder="" name="urlpdf" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>URL - Documento Drive</label>
                        <input type="text" class="form-control" placeholder="" name="urldrive" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>URL - Tarea <span class="text-danger">(Ejem. Formulario)</span></label>
                        <input type="text" class="form-control" placeholder="" name="homework" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha de Vencimiento <span class="text-danger"> (Si no seleccionas una le pondrá 2 dias mas a la fecha del tema)</span></label>
                        <input type="date" class="form-control" placeholder="" name="date_vencimiento" value="Aqui un date Picker">
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Crear Tema</button>
                    </div>
                  </div>
                </form>
                <span class="text-danger">(*) Campos Obligatorios</span>
              </div>
            </div>
          </div>
		</div>


		<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de Temas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="d-none d-sm-block">
                        Número del tema
                      </th>
                      <th>
                        TEMA
                      </th>
                      <th class="d-none d-sm-inline-block">
                        Fecha del Tema
                      </th>
                      <th class="d-none d-sm-inline-block">
                        Tools
                      </th>
                    </thead>
                    <tbody>

                      @forelse($subjects as $subject)

                        <tr>
                          <td class="d-none d-sm-block">
                            <b>Bimestre-{{ $subject->bimester  }}</b> / <b>Unidad-{{ $subject->unit  }}</b> / <b>TEMA-{{ $subject->position  }}</b>
                          </td>
                          
                          <td>
                            <a href=" {{ route('temadetalle', $subject->id) }} " class="text-dark ml-3" data-toggle="tooltip" title="Ver Tema">{{ $subject->name }}</a>

                            @if( $subject->link_youtube != null)
                              <img src="{{ asset('images/logo_youtube.png') }}" width="28px;">
                            @endif

                            @if( $subject->homework != null)
                              <img src="{{ asset('images/icon-google-forms.png') }}" width="20px;">
                            @endif

                            @if( $subject->urlpdf != null)
                              <img src="{{ asset('images/logo_pdf.png') }}" width="24px;">
                            @endif

                            @if( $subject->urldrive != null)
                              <img src="{{ asset('images/logo_drive.png') }}" width="20px;">
                            @endif

                            @if( $subject->zoom != null)
                              <img src="{{ asset('images/logo_zoom.png') }}" width="20px;">
                            @endif

                          </td>

                          <td class="d-none d-sm-inline-block">{{ $subject->date }}</td>
                          
                          <td class="d-none d-sm-inline-block">
                            <a href=" {{ route('temadetalle', $subject->id) }} " class="btn btn-warning button-tooltip" data-toggle="tooltip" title="Ver Tema"><i class="fas fa-search"></i></a>

                            <a href=" {{ route('temaedit', $subject->id) }} " class="btn btn-danger button-tooltip" data-toggle="tooltip" title="Editar Curso"><i class="far fa-edit"></i></a>
                          </td>

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