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
                    <div class="col-md-6 pr-sm-1">
                      <div class="form-group">
                        <label>Nombre del Tema <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" placeholder=""  name="name" value=" {{$tema->name}} ">
                      </div>
                    </div>

                    <div class="col-md-2 pr-sm-1">
                      <div class="form-group">
                        <label>Bimestre <span class="text-danger">(*) (Ejem. 1, 2, 3)</span> </label>
                        <input type="text" class="form-control" name="bimester" placeholder="" value=" {{$tema->bimester}} ">
                      </div>
                    </div>
                    <div class="col-md-2 px-sm-1">
                      <div class="form-group">
                        <label>Unidad <span class="text-danger">(*) (Ejem. 1, 2, 3)</span> </label>
                        <input type="text" class="form-control"  name="unit" placeholder="" value=" {{$tema->unit}} ">
                      </div>
                    </div>
                    <div class="col-md-2 pl-sm-1">
                      <div class="form-group">
                        <label>Número de Tema <span class="text-danger">(*) (Ejem. 1, 2, 3)</span> </label>
                        <input type="text" class="form-control"  name="position"  placeholder="" value=" {{$tema->position}} ">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>URL Video Youtube</label>
                        <input type="text" class="form-control" placeholder="" name="link_youtube" value=" {{$tema->link_youtube}} ">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Fecha : </label>
                        @if($tema->date == null)
                           <input type="date" class="form-control" placeholder="" name="date" value="" required>
                        @else
                          <input type="date" class="form-control" placeholder="" name="date" value="{{$tema->date->format('Y-m-d')}}" required>
                        @endif
                        <input type="hidden" name="user_id" class="form-control mb-2" value="{{ Auth::user()->parent_id }}">
                        <input type="hidden" name="level_course_id" class="form-control mb-2" value="{{$tema->id}}">
                      </div>
                    </div>
                  </div>

                  <h5 class="card-title">Material Adicional Opcional</h5>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Link ZOOM</label>
                        <input type="text" class="form-control" placeholder="" name="zoom" value="{{$tema->zoom}}">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>URL - Documento PDF</label>
                        <input type="text" class="form-control" placeholder="" name="urlpdf" value="{{$tema->urlpdf}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>URL - Documento Drive</label>
                        <input type="text" class="form-control" placeholder="" name="urldrive" value="{{$tema->urldrive}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>URL - Tarea (Ejem. Formulario)</label>
                        <input type="text" class="form-control" placeholder="" name="homework" value="{{$tema->homework}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Fecha de vencimiento de la tarea: </label>
                        @if($tema->fecha_vencimiento == null)
                           <input type="date" class="form-control" placeholder="" name="fecha_vencimiento" value="">
                        @else
                          <input type="date" class="form-control" placeholder="" name="fecha_vencimiento" value="{{$tema->fecha_vencimiento->format('Y-m-d')}}">
                        @endif
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Actualizar Tema</button>
                    </div>
                  </div>
                </form>
                <span class="text-danger">(*) Campos Obligatorios</span>
              </div>
            </div>
          </div>
		</div>

	</div>



	</div>

	

@endsection