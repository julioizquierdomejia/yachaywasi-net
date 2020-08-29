<?php $__env->startSection('content'); ?>

  <?php if( Auth::user()->status == 0): ?>
      
      <div class="card text-center">
        <div class="card-header">
          Bienvenido
        </div>
        <div class="card-body">
          <h5 class="card-title"> <?php echo e(Auth::user()->name); ?> </h5>
          <p class="card-text">De momento tu cuenta se encuentra en revisión</p>
        </div>
        <div class="card-footer text-muted">
          yachaywasi
        </div>
      </div>      

  <?php elseif( Auth::user()->status == 1): ?>

    <?php if( Auth::user()->roles->first()->name == 'superadmin'): ?>
      <div class="content">
        <!-- 
        <div class="row mb-3">
          <div class="col">
            <div class="update ml-auto mr-auto">
              <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-round">Registrar Docente</a>
            </div>
          </div>
        </div>
      -->

        <div class="row">
          <div class="col">
            <h3 class="text-primary">Colegios - <?php echo e($docentes->count()); ?></h3>
          </div>
        </div>
        <div class="row">
          <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="height: 180px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-md-3">
                      <div class="icon-big text-center icon-warning">
                        <?php if($docente->avatar == null): ?>
                        <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                          <img src="images/avatar/guest-user.jpg" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                        </figure>
                        <?php else: ?>
                        <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                          <img src="images/avatar/<?php echo e($docente->avatar); ?>" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                        </figure>
                        <?php endif; ?>
                        <!--<i class="fas fa-laptop-code text-primary"></i>-->
                      </div>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="">
                        <h5 class="text-warning"><a href=" <?php echo e(route('user.show', $docente->user_id)); ?> "><b>Colegio</b> <br> <?php echo e($docente->name); ?></a></h5>
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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>
      </div>
    <?php endif; ?>

    <?php if( Auth::user()->roles->first()->name == 'admin'): ?>
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
                  <p class="card-title"><?php echo e($docentes->count()); ?><p>
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
                  <p class="card-title"><?php echo e($cursos->count()); ?><p>
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
          <h3 class="text-primary">Lista de Docentes - <?php echo e($docentes->count()); ?> - Colaboradores</h3>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col mb-4">
            <div class="card">
              <!-- card Body -->
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      <?php if($docente->avatar == null): ?>
                      <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                        <img src="images/avatar/guest-user.jpg" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                      </figure>
                      <?php else: ?>
                      <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                        <img src="images/avatar/<?php echo e($docente->avatar); ?>" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                      </figure>
                      <?php endif; ?>
                      <!--<i class="fas fa-laptop-code text-primary"></i>-->
                    </div>
                  </div>
                  <div class="col-9 col-md-9">
                    <div class="">
                      <h5 class="text-danger"><a href=" <?php echo e(route('user.show', $docente->user_id)); ?> "><?php echo e($docente->name); ?></a></h5>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="row">
        <div class="col">
          <h3 class="text-primary">Lista de Cursos - <?php echo e($cursos->count()); ?></h3>
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
                    <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($curso->id); ?>

                      </td>
                      <td>
                        <?php echo e($curso->name); ?>

                      </td>
                      <td>
                        <?php echo e($curso->abreviatura); ?>

                      </td>
                      <td class="text-right">
                        
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <?php endif; ?>

    <!-- Aqui empieza la vista Dashboard para DOCENTE -->
    <?php if( Auth::user()->roles->first()->name == 'editor'): ?>
    <div class="content">
      <?php $__currentLoopData = $degreeLevelUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degreeLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row">
            <div class="col-12">
              <h3><b>Nivel <?php echo e($degreeLevel->level->name); ?></b> - <?php echo e($degreeLevel->degree->name); ?></h3>

              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <?php $__currentLoopData = $degreeLevel->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col mb-4">
                    <div class="card" style='height: 340px;'>
                      <?php if($curso->course->images == null): ?>
                        <img class="card-img-top" src="images/course-default.png" alt="Card image cap">
                      <?php else: ?>
                        <img class="card-img-top" src="images/course/<?php echo e($curso->course->images); ?>" alt="Card image cap">
                      <?php endif; ?>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo e($curso->course->name); ?></h5>
                      </div>

                      <div class="card-footer mt">
                          <a href="<?php echo e(route('subject',$curso->id)); ?>" class="btn btn-sm btn-primary">Temas</a>
                      </div>


                    </div>
                    
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?> 

    <!-- FIN DE la vista Dashboard para DOCENTE --> 


    <!-- Aqui empieza la vista Dashboard para ALUMNO -->
    <?php if( Auth::user()->roles->first()->name == 'lector'): ?>
    <h1><i class="fas fa-chalkboard-teacher"></i> Mis Cursos</h1>
    <div class="row">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $curso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col mb-4">
                <div class="card" style='height: 340px;'>
                  <?php if($curso_item->course_images == null): ?>
                    <img class="card-img-top" src="images/course-default.png" alt="Card image cap">
                  <?php else: ?>
                    <img class="card-img-top" src="images/course/<?php echo e($curso_item->course_images); ?>" alt="Card image cap">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo e($curso_item->course_name); ?></h5>
                    <p class="card-text"> algo aqui</p>
                  </div>
                  <div class="card-footer mt">
                    <a href="<?php echo e(route('vertemas', ['course_id'=>$curso_item->dlc_id])); ?>" class="btn btn-primary">
                      <i class="fas fa-file-alt"></i>
                      Ver temas
                    </a>
                  </div>
                </div>
              </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

      <div class="row">
        <div class="col">
          <ul class="list-unstyled">
          <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $curso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><h5><a href="<?php echo e(route('vertemas', ['course_id'=>$curso_item->dlc_id])); ?>"><?php echo e($curso_item->course_name); ?></a></h5></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
    <!-- FIN DE la vista Dashboard para ALUMNO --> 

<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>