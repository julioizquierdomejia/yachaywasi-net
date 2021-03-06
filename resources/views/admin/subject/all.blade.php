@extends('layouts.app')

@section('content')

<div class="container-fluid bg-light p-5">
	
	<h3 style='font-size: 26px;'><i class="fas fa-file-alt"></i> Listado de Temas</h3>
	

	<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de Temas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table display" id="table_subjects">
                    <thead class=" text-primary">
                      <th>
                        Número del tema
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
                        <?php
                          //array de Meses
                          $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                          $dias = [
                            0=>'Domingo',
                            1=>'Lunes', 
                            2=>'Martes', 
                            3=>'Miércoles', 
                            4=>'Jueves', 
                            5=>'Viernes', 
                            6=>'Sábado'
                          ];

                          $diaDeSemana = $dias[ $tema->date->dayOfWeek ];
                          $dia = $tema->date->day;
                          $mes = $tema[ $tema->date->month -1 ];
                          $anio = $tema->date->year;
                        ?>

                        <tr>
                        	
                          <td><b>Bimestre-{{ $tema->bimester  }}</b> / <b>Unidad-{{ $tema->unit  }}</b> / <b>TEMA-{{ $tema->position  }}</b></td>
                          <td>{{ $tema->name  }}</td>
                          <td>{{$diaDeSemana}}, {{$dia}} de {{$mes}} del {{$anio}} </td>
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