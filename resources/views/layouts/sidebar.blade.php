@php
  $role = Auth::user()->roles->first()->name;
@endphp
<div class="sidebar" data-color="black" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.beyondstudios.pe" class="simple-text logo-normal">
          YachaywasiNet
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        @if ( Auth::user()->status == 0 )
            
        @elseif ( Auth::user()->status == 1 )
            @if ( $role == 'superadmin')
              <ul class="nav">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <a href="{{ route('dashboard') }}">
                    <i class="fas fa-chart-line"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('course.index') ? 'active' : '' }}">
                  <a href="{{ route('course.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <p>Áreas</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                  <a href="{{ route('user.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                  <a href="{{ route('user.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
              </ul>
            @endif

            @if ( $role == 'admin')
              <ul class="nav">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <a href="{{ route('dashboard') }}">
                    <i class="fas fa-chart-line"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('course.index') ? 'active' : '' }}">
                  <a href="{{ route('course.index') }}">
                    <i class="fas fa-book-reader"></i>
                    <p>Áreas</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                  <a href="{{ route('user.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('student.index') ? 'active'  : '' }}">
                  <a href="{{ route('student.index') }}">
                    <i class="fas fa-user-graduate"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('subject.all') ? 'active'  : '' }}">
                  <a href="{{ route('subject.all') }}">
                    <i class="fab fa-elementor"></i>
                    <p>Temas Publicados</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('schedule.assign') ? 'active'  : '' }}">
                  <a href="{{ route('schedule.assign') }}">
                    <i class="far fa-calendar-check"></i>
                    <p>Asignar horario</p>
                  </a>
                </li>
              </ul>
            @endif

            @if ( $role == 'editor')
              <ul class="nav">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <a href="{{ route('dashboard') }}">
                    <i class="fas fa-book-reader"></i>
                    <p>Cursos</p>
                  </a>
                </li>
                <li class="{{ request()->routeIs('schedule') ? 'active' : '' }}">
                  <a href="{{ route('schedule') }}">
                    <i class="far fa-calendar-alt"></i>
                    <p>Horario</p>
                  </a>
                </li>
              </ul>
            @endif

            @if ( $role == 'lector')
              <ul class="nav">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <a href="{{ route('dashboard') }}">
                    <i class="fas fa-book-reader"></i>
                    <p>Mis Cursos</p>
                  </a>
                </li>

                <li class="{{ request()->routeIs('schedule') ? 'active' : '' }}">
                  <a href="{{ route('schedule') }}">
                    <i class="far fa-calendar-alt"></i>
                    <p>Horario</p>
                  </a>
                </li>

              </ul>
            @endif


        @endif
      </div>
    </div>