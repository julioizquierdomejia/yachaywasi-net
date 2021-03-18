@extends('layouts.app')

@section('content')
<?php
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
?>
<div class="container-fluid bg-light p-5">
	
	<h3 style='font-size: 26px;'><i class="fas fa-file-alt"></i> Listado de Temas</h3>
	<h4> Curso : {{ $curso_current->course->name }}  / A cargo de : {{ $docente_current->name }}</h4>

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
                      <th>Número del tema</th>
                      <th>TEMA</th>
                      <th>Fecha del Tema</th>
                      @if ($role == 'lector')
                      <th>Fecha vista</th>
                      @endif
                      <th>Estado</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      @forelse($temas as $tema)
                      @php
                        $diaDeSemana = $dias[ $tema->date->dayOfWeek ];
                        $dia = $tema->date->day;
                        $mes = $meses[ $tema->date->month -1 ];
                        $anio = $tema->date->year;

                        $tema_date = $diaDeSemana.', '.$dia .' de '. $mes. ' del '. $anio;
                        $v_date = '<span class="badge badge-warning px-3">Pendiente</span>';
                      @endphp
                      @if ($tema->user_views->count())
                        @php
                          $tema_v_date = $tema->user_views->first()->created_at;
                          $diaDeSemana = $dias[ $tema_v_date->dayOfWeek ];
                          $dia = $tema_v_date->day;
                          $mes = $meses[ $tema_v_date->month -1 ];
                          $anio = $tema_v_date->year;
                          $v_date = $diaDeSemana.', '.$dia .' de '. $mes. ' del '. $anio;
                        @endphp
                      @endif
                        <tr>
                          <td>
                            <a href="{{ route('temadetalle', $tema->id) }}">
                            <b>Bimestre-{{ $tema->bimester  }}</b> / <b>Unidad-{{ $tema->unit  }}</b> / <b>TEMA-{{ $tema->position  }}</b>
                            </a>
                          </td>
                          <td>{{ $tema->name  }}</td>
                          <td >{{$tema_date}}</td>
                          @if ($role == 'lector')
                          <td>
                            {!!$v_date!!}
                          </td>
                          @endif
                          <td>
                            @if ($role == 'lector')
                            {!! $tema->user_views->count() ? '<span class="badge badge-success px-3">Visto</span>' : '<span class="badge badge-warning px-3">Pendiente</span>' !!}
                            @else
                            {{$tema->views->count() . ' veces visto' ?? 'Pendiente'}}
                            @endif
                          </td>
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