@extends('layouts.app')

@section('content')

<div class="container-fluid bg-light p-5">
	
	<h3 style='font-size: 26px;'><i class="fas fa-file-alt"></i> Listado de Temas</h3>
	<h4> Curso : {{ $curso_current->name }} / A cargo de : {{ $docente_current->name }}</h4>

	<div class="content p-0">
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
                      <th>
                        Numero del tema
                      </th>
                      <th>
                        TEMA
                      </th>
                      <th>
                        Fecha del Tema
                      </th>
                      <th>
                      	Estado
                      </th>
                      <th>
                        Tools
                      </th>
                    </thead>
                    <tbody>
                      
                      @forelse($temas as $tema)
                        <tr>
                          <td>
                            <a href="{{ route('temadetalle', $tema->id) }}">
                            <b>Bimestre-{{ $tema->bimester  }}</b> / <b>Unidad-{{ $tema->unit  }}</b> / <b>TEMA-{{ $tema->position  }}</b>
                            </a>
                          </td>
                          <td>{{ $tema->name  }}</td>
                          <td >{{ $tema->date  }}</td>
                          <td>Pendiente</td>
                          <td>
                            <a href=" {{ route('temadetalle', $tema->id) }} " class="btn btn-warning button-tooltip" data-toggle="tooltip" title="Ver Tema"><i class="fas fa-search"></i></a>
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


@endsection