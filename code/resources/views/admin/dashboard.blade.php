@extends('layouts.app')

@section('content')

  @if ( Auth::user()->status == 0)
      
      <div class="card text-center">
        <div class="card-header">
          Bienvenido
        </div>
        <div class="card-body">
          <h5 class="card-title"> {{ Auth::user()->name }} </h5>
          <p class="card-text">De momento tu cuenta se encuentra en revisión</p>
        </div>
        <div class="card-footer text-muted">
          yachaywasi
        </div>
      </div>      

  @elseif ( Auth::user()->status == 1)

    @if ( Auth::user()->roles->first()->name == 'superadmin')
      <div class="content">
        <!-- 
        <div class="row mb-3">
          <div class="col">
            <div class="update ml-auto mr-auto">
              <a href="{{ route('user.create') }}" class="btn btn-primary btn-round">Registrar Docente</a>
            </div>
          </div>
        </div>

      -->

        <div class="row">
          <div class="col">
            <h3 class="text-primary">Colegios - {{ $docentes->count() }}</h3>
          </div>
        </div>
        <div class="row">
          @foreach($docentes as $docente)
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
                <div class="card-footer ">
                  <hr>
                  <div class="stats text-primary">
                    <i class="fas fa-book-reader text-danger"></i>
                    Docente del 3ero Grado
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
    @endif

    @if ( Auth::user()->roles->first()->name == 'admin')
    <!-- Aqui los card de informacion general -->
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
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
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Update Now
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
                  <p class="card-title">320<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-calendar-o"></i>
              Last day
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
              Update now
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
                  <p class="card-title">1450<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-clock-o"></i>
              In the last hour
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
        @foreach($docentes as $docente)
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
              <div class="card-footer ">
                <hr>
                <div class="stats text-primary">
                  <i class="fas fa-book-reader text-danger"></i>
                  Docente del 3ero Grado
                </div>
              </div>
              <!-- end card Footer -->

            </div>
          </div>
        @endforeach
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
                    <th>
                      id
                    </th>
                    <th>
                      Curso
                    </th>
                    <th>
                      abreviatura
                    </th>
                    <th class="text-right">
                      Tools
                    </th>
                  </thead>
                  <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                      <td>
                        {{ $curso->id }}
                      </td>
                      <td>
                        {{ $curso->name }}
                      </td>
                      <td>
                        {{ $curso->abreviatura }}
                      </td>
                      <td class="text-right">
                        
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

    </div>
    @endif

    <!-- Aqui empieza la vista Dashboard para DOCENTE -->
    @if ( Auth::user()->roles->first()->name == 'editor')
    <div class="content">
        @foreach($degreeLevelUser as $degreeLevel)
            <div class="row">
              <div class="col-12">
                <h3>Nivel {{ $degreeLevel->level->name }} - {{ $degreeLevel->degree->name }}</h3>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                    @foreach($degreeLevel->courses as $course)
                      <div class="col mb-4">
                        <div class="card" style='height: 400px;'>
                          <img class="card-img-top" src="images/course-default.png" alt="Card image cap">
                          <div class="card-body">
                            <h6 class="card-title"><a href="{{ route('subject',$course->id) }}">{{ $course->course->name }}</a></h6>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
              
              <!-- <p class="card-category"><p> <a href="{{ route('subject',$course->id) }}" class="btn btn-sm btn-primary">Temas</a></p></p> -->


              </div>
            </div>
         @endforeach
          
            <div class="row">
                @foreach($degreeLevelUser as $degreeLevel)
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                      <div class="card-body ">
                        <div class="row">
                          <div class="col-4 col-md-3">
                            <div class="icon-big text-center icon-warning">
                              <i class="fas fa-book"></i>
                            </div>
                          </div>
                          <div class="col-8 col-md-9">
                            <div class="numbers">
                              <p class="card-category">Nivel {{ $degreeLevel->level->name }} - {{ $degreeLevel->degree->name }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer ">
                        <hr>

                        @foreach($degreeLevel->courses as $course)
                          <p>{{ $course->course->name }} <a href="{{ route('subject',$course->id) }}" class="btn btn-sm btn-primary">Temas</a></p>
                        @endforeach
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
    @endif 

    <!-- FIN DE la vista Dashboard para DOCENTE --> 


    <!-- Aqui empieza la vista Dashboard para ALUMNO -->
    @if ( Auth::user()->roles->first()->name == 'lector')
      <div class="row">
        <div class="col">
          <ul class="list-unstyled">
          @foreach($cursos as $curso)
            <li><h5>{{$curso->course_name}}</h5></li>
          @endforeach
          </ul>
        </div>
      </div>
    @endif
    <!-- FIN DE la vista Dashboard para ALUMNO --> 

@endif


@endsection