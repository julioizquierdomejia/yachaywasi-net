@extends('layouts.app')
@section('content')
  @if ( Auth::user()->status == 0)
    <div class="card text-center">
      <div class="card-header">
        <h4 class="card-title">Bienvenido</h4>
      </div>
      <div class="card-body">
        <h5 class="card-title"> {{ Auth::user()->name }} </h5>
        <p class="card-text">De momento tu cuenta se encuentra en revisión - Por mantener Cuentas pendientes</p>
      </div>
      <div class="card-footer text-muted">
        yachaywasi
      </div>
    </div>
  @elseif ( Auth::user()->status == 1)
    @if ( $role == 'superadmin')
      <div class="content">
        <div class="row">
          <div class="col">
            <h3 class="text-primary">Colegios - {{ $docentes->count() }}</h3>
          </div>
        </div>
        <div class="row">
          @forelse($docentes as $docente)
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="height: 180px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-md-3">
                      <div class="icon-big text-center icon-warning">
                        @if ($docente->avatar == null)
                        <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                          <img src="images/avatar/guest-user.jpg" class="figure-img img-fluid rounded" alt="{{$docente->name}}" style="">
                        </figure>
                        @else
                        <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                          <img src="images/avatar/{{$docente->avatar}}" class="figure-img img-fluid rounded" alt="{{$docente->name}}" style="">
                        </figure>
                        @endif
                        <!--<i class="fas fa-laptop-code text-primary"></i>-->
                      </div>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="">
                        <h5 class="text-warning"><a href=" {{ route('user.show', $docente->user_id) }} "><b>Colegio</b> <br> {{$docente->name}}</a></h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr>
                  <div class="stats text-primary">
                    <i class="fas fa-book-reader text-danger"></i>
                    Docente del 3ero Grado
                  </div>
                </div>
              </div>
            </div>
          @empty
          <div class="col-lg-12">
            <p class="text-muted">No hay docentes.</p>
          </div>
          @endforelse
        </div>
      </div>
    @endif

    @if ( $role == 'admin')
    <!-- Aqui los card de informacion general -->
    <div class="row">
      <div class="col">

      </div>
    </div>

    {{--
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="numbers">
                    <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Espacio disponible en el servidor
            </div>
          </div>
        </div>
      </div>
    </div>
--}}

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fas fa-chalkboard-teacher text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Docentes</p>
                  <p class="card-title">{{ $docentes->count() }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Parte de nuestro equipo
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fas fa-user-graduate text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Alumnos Matriculados</p>
                  <p class="card-title">{{ $alumnos->count() }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-calendar-o"></i>
              Este año
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fas fa-laptop-code text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Cursos</p>
                  <p class="card-title">{{ $cursos->count() }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Que se dictan
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fas fa-shapes text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Temas publicados</p>
                  <p class="card-title">{{ $temas_total->count() }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-clock-o"></i>
              Hasta la ultima hora
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin de los card de informacion general del colegio-->
    <div class="content">
      <div class="row">
        <div class="col">
          <h3 class="text-primary">Lista de Docentes - {{ $docentes->count() }} - Colaboradores</h3>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        @forelse($docentes as $docente)
          <div class="col mb-4">
            <div class="card">
              <!-- card Body -->
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      @if ($docente->avatar == null)
                      <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                        <img src="images/avatar/guest-user.jpg" class="figure-img img-fluid rounded" alt="{{$docente->name}}" style="">
                      </figure>
                      @else
                      <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                        <img src="images/avatar/{{$docente->avatar}}" class="figure-img img-fluid rounded" alt="{{$docente->name}}" style="">
                      </figure>
                      @endif
                      <!--<i class="fas fa-laptop-code text-primary"></i>-->
                    </div>
                  </div>
                  <div class="col-9 col-md-9">
                    <div class="">
                      <h5 class="text-danger"><a href=" {{ route('user.show', $docente->user_id) }} ">{{$docente->name}}</a></h5>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card Body -->
              <!-- card Footer -->
              <div class="card-footer">
                <hr>
                <div class="stats text-primary">
                  <i class="fas fa-book-reader text-danger"></i>
                  Docente del 3ero Grado
                </div>
              </div>
              <!-- end card Footer -->
            </div>
          </div>
        @empty
          <div class="col mb-4">
            <p class="text-muted">No hay docentes.</p>
          </div>
        @endforelse
      </div>

      <div class="row">
        <div class="col">
          <h3 class="text-primary">Lista de Cursos - {{ $cursos->count() }}</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>id</th>
                    <th>Curso</th>
                    <th>abreviatura</th>
                    <th class="text-right">Tools</th>
                  </thead>
                  <tbody>
                    @forelse($cursos as $curso)
                    <tr>
                      <td>{{ $curso->id }}</td>
                      <td>{{ $curso->name }}</td>
                      <td>{{ $curso->abreviatura }}</td>
                      <td class="text-right">
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td class="text-muted" colspan="4">No hay cursos por el momento.</td>
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
    @endif

    <!-- Aqui empieza la vista Dashboard para DOCENTE -->
    @if ( $role == 'editor')
    <div class="content">
      <h2>{{ $userAuth->name }}</h2>
      @foreach($degreeLevelUser as $degreeLevel)
        <div class="row">
          <div class="col-12">
            <h3><b>Nivel {{ $degreeLevel->level->name }}</b> - {{ $degreeLevel->degree->name }}</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
              @forelse ($degreeLevel->courses as $curso)
                <div class="col mb-4">
                  <div class="card" style='height: 340px;'>
                    @if($curso->course->images == null)
                      <img class="card-img-top" src="images/course-default.png" alt="{{$curso->course->name}}">
                    @else
                      <img class="card-img-top" src="images/course/{{$curso->course->images}}" alt="{{$curso->course->name}}">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$curso->course->name}}</h5>
                    </div>
                    <div class="card-footer mt">
                        <a href="{{ route('subject',$curso->id) }}" class="btn btn-sm btn-primary">Temas</a>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col mb-4">
                  <p class="text-muted">No har cursos por el momento.</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
       @endforeach
    </div>
    @endif
    {{-- FIN DE la vista Dashboard para DOCENTE --}}

    {{-- Aqui empieza la vista Dashboard para ALUMNO --}}
    @if ( $role == 'lector')
    <div class="content">
      <h1><i class="fas fa-chalkboard-teacher"></i> Mis Cursos</h1>
      <h2>{{ $userAuth->name }}</h2>
      <h3><b>Nivel {{ $degreeLevelUser->first()->level->name }}</b> - {{ $degreeLevelUser->first()->degree->name }}</h3>
      <div class="row">
        <div class="col-12">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
              @foreach($cursos as $curso_item)
                <div class="col mb-4">
                  <div class="card" style='height: 340px;'>
                    @if($curso_item->images)
                    <img class="card-img-top" src="/images/course/{{$curso_item->images}}" alt="{{$curso_item->course_name}}">
                    @else
                      <img class="card-img-top" src="/images/course-default.png" alt="{{$curso_item->course_name}}">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$curso_item->course_name}}</h5>
                      <p class="card-text"> </p>
                    </div>
                    <div class="card-footer mt">
                      <a href="{{route('vertemas', [
                      'degree_course_id' => $curso_item->dlc_id
                      ])}}" class="btn btn-primary">
                        <i class="fas fa-file-alt"></i>
                        Ver temas 
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
  </div>
  @endif
@endif

@endsection

@section('script')

@endsection
